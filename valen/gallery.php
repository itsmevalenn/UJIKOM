<?php
class Gallery
{
    private $db;
    public function __construct()
    {
        $this->db = new mysqli("localhost", "root", "", "UKK2024_ARIELVALEN");
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function getFoto()
    {
        $foto = [];
        $query = "SELECT * FROM foto";
        $result = $this->db->query($query);
        while ($row = $result->fetch_assoc()) {
            $foto[] = $row;
        }
        return $foto;
    }

    public function uploadfoto($file, $DeskripsiFoto)
    {
        $targetDir = "foto/";
        $targetFile = $targetDir . basename($file['name']);
        $fotoFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file is an actual foto
        $check = getimagesize($file['tmp_name']);
        if ($check === false) {
            return "File is not a foto.";
        }

        // Check if file already exists
        

        // Check file size
        if ($file['size'] > 5000000) { // 5 MB
            return "Sorry, your file is too large.";
        }

        // Allow certain file formats
        $allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($fotoFileType, $allowedFormats)) {
            return "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        }

        // Move the file to the target directory
        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            $this->saveToDatabase($targetFile, $DeskripsiFoto);
            return true;
        } else {
            return "Sorry, there was an error uploading your file.";
        }
    }

    private function saveToDatabase($JudulFoto, $DeskripsiFoto)
    {
        $query = "INSERT INTO foto (JudulFoto, DeskripsiFoto) VALUES ('$JudulFoto', '$DeskripsiFoto')";
        if (!$this->db->query($query)) {
            return "Error: " . $this->db->error;
        }
    }

    public function deletefoto($fotoID)
    {
        // Dapatkan informasi file yang akan dihapus
        $fotoInfo = $this->getFotoInfo($fotoID);
    
        if (!$fotoInfo) {
            return "Foto not found.";
        }
    
        // Pengecekan apakah file fisiknya ada sebelum mencoba menghapusnya
        if (file_exists($fotoInfo['FotoID'])) {
            // Hapus file dari direktori
            if (unlink($fotoInfo['FotoID'])) {
                // Hapus data dari database
                $query = "DELETE FROM foto WHERE JudulFoto = '$fotoID'";
                if (!$this->db->query($query)) {
                    return "Error: " . $this->db->error;
                }
                return true;
            } else {
                return "Failed to delete foto.";
            }
        } else {
            // Jika file fisik tidak ditemukan, hapus saja dari basis data
            $query = "DELETE FROM foto WHERE FotoID = '$fotoID'";
            if (!$this->db->query($query)) {
                return "Error: " . $this->db->error;
            }
            return true;
        }
    }

    public function editfoto($id, $file, $newDeskripsiFoto)
{
    $fotoInfo = $this->getFotoInfo($id);

    if (!$fotoInfo) {
        return "Foto not found.";
    }

    // Jika tidak ada file yang diunggah, hanya edit DeskripsiFoto
    if (empty($file['name'])) {
        $query = "UPDATE foto SET DeskripsiFoto = '$newDeskripsiFoto' WHERE FotoID = '$id'";
        if (!$this->db->query($query)) {
            return "Error: " . $this->db->error;
        }
        return true;
    }

    // Jika ada file yang diunggah, proses seperti biasa
    $targetDir = "foto/";
    $targetFile = $targetDir . basename($file['name']);

    // Hapus file lama
    if (file_exists($fotoInfo['JudulFoto'])) {
        unlink($fotoInfo['JudulFoto']);
    }

    // Pindahkan file baru
    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        // Update DeskripsiFoto di database
        $query = "UPDATE foto SET JudulFoto = '$targetFile', DeskripsiFoto = '$newDeskripsiFoto' WHERE FotoID = '$id'";
        if (!$this->db->query($query)) {
            return "Error: " . $this->db->error;
        }
        return true;
    } else {
        return "Failed to upload file.";
    }
}

    public function hapusDeskripsiFoto($FotoID)
    {
        $fotoInfo = $this->getFotoInfo($FotoID);

        if (!$fotoInfo) {
            return "Foto not found.";
        }

        // Hapus DeskripsiFoto dari database
        $query = "UPDATE foto SET DeskripsiFoto = NULL WHERE FotoID = '$FotoID'";
        if (!$this->db->query($query)) {
            return "Error: " . $this->db->error;
        }

        return true;
    }

    public function getFotoInfo($FotoID)
    {
        $FotoID = $this->db->real_escape_string($FotoID);
        $query = "SELECT * FROM foto WHERE FotoID = '$FotoID'";
        $result = $this->db->query($query);

        return $result->fetch_assoc();
    }
    
}
?>


