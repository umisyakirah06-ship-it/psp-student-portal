<?php

require_once __DIR__ . '/../models/Student.php';

class ProfileController
{
    private $studentModel;

    public function __construct()
    {
        $this->studentModel = new Student();
    }

    public function getProfile($studentId)
    {
        return $this->studentModel->getStudentById($studentId);
    }

    public function uploadProfilePicture($studentId, $file)
    {
        $maxSize = 2 * 1024 * 1024; // 2MB
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $allowedMimeTypes = ['image/jpeg', 'image/png'];

        if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
            return 'Please select a valid image to upload.';
        }

        if ($file['size'] > $maxSize) {
            return 'File size must not exceed 2MB.';
        }

        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($extension, $allowedExtensions, true)) {
            return 'Only JPG, JPEG and PNG files are allowed.';
        }

        // Check the real MIME type instead of trusting the file extension.
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        if (!in_array($mimeType, $allowedMimeTypes, true)) {
            return 'Invalid image file type.';
        }

        // Make sure the uploaded file is actually a valid image.
        if (@getimagesize($file['tmp_name']) === false) {
            return 'The uploaded file is not a valid image.';
        }

        $uploadDirectory = __DIR__ . '/../public/uploads/profile_pictures/';

        if (!is_dir($uploadDirectory) && !mkdir($uploadDirectory, 0755, true)) {
            return 'Unable to create the upload directory.';
        }

        $filename = time() . '_' . uniqid('', true) . '.' . $extension;
        $destination = $uploadDirectory . $filename;

        if (!move_uploaded_file($file['tmp_name'], $destination)) {
            return 'Failed to upload the profile picture.';
        }

        $oldProfile = $this->studentModel->getProfilePicture($studentId);

        if (!$this->studentModel->updateProfilePicture($studentId, $filename)) {
            if (file_exists($destination)) {
                unlink($destination);
            }
            return 'Failed to save the profile picture information.';
        }

        // Delete the previous generated profile image after successful update.
        if (!empty($oldProfile['profile_picture'])) {
            $oldFile = $uploadDirectory . basename($oldProfile['profile_picture']);
            if (is_file($oldFile)) {
                unlink($oldFile);
            }
        }

        return true;
    }
}

?>