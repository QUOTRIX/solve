<?php
/**
 * Deployment Script
 * 
 * Usage: php deploy.php
 */

// Configuration
$config = [
    'repository' => 'https://github.com/QUOTRIX/solve.git',
    'branch'     => 'main',
    'ftp_host'   => 'YOUR_HOSTINGER_FTP_HOST',
    'ftp_user'   => 'YOUR_HOSTINGER_FTP_USERNAME',
    'ftp_pass'   => 'YOUR_HOSTINGER_FTP_PASSWORD',
    'ftp_path'   => '/public_html/wp-content/themes/solve/'
];

// Create temp directory
$temp_dir = sys_get_temp_dir() . '/wp-deploy-' . time();
echo "Creating temporary directory...\n";
mkdir($temp_dir);

// Clone repository
echo "Cloning repository...\n";
exec("git clone --branch {$config['branch']} {$config['repository']} {$temp_dir}");

// Connect to FTP
echo "Connecting to FTP...\n";
$ftp = ftp_connect($config['ftp_host']);
if (!$ftp) {
    die("Could not connect to FTP host\n");
}

// Login
if (!ftp_login($ftp, $config['ftp_user'], $config['ftp_pass'])) {
    die("Could not login to FTP\n");
}

// Enable passive mode
ftp_pasv($ftp, true);

/**
 * Upload directory recursively
 */
function upload_directory($ftp, $local_path, $remote_path) {
    $handle = opendir($local_path);
    while (($file = readdir($handle)) !== false) {
        if ($file == '.' || $file == '..') continue;
        
        $local_file = $local_path . '/' . $file;
        $remote_file = $remote_path . '/' . $file;
        
        if (is_dir($local_file)) {
            // Create directory if it doesn't exist
            if (!@ftp_chdir($ftp, $remote_file)) {
                ftp_mkdir($ftp, $remote_file);
            }
            upload_directory($ftp, $local_file, $remote_file);
        } else {
            echo "Uploading {$file}...\n";
            ftp_put($ftp, $remote_file, $local_file, FTP_BINARY);
        }
    }
    closedir($handle);
}

// Upload files
echo "Uploading files...\n";
upload_directory($ftp, $temp_dir, $config['ftp_path']);

// Clean up
echo "Cleaning up...\n";
exec("rm -rf {$temp_dir}");
ftp_close($ftp);

echo "Deployment complete!\n";
