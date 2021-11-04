<?php

require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Aws\S3\Exception\S3Exception;

define('ORACLE_ACCESS_KEY', '79dca448f7dfe562e9cccde8f701cf5fa65fc579');
define('ORACLE_SECRET_KEY', 'xNjtSiQHZQaTEFu0Ffld4PXraRrZKN7ylRC7wVf3eUk=');
define('ORACLE_REGION', 'ap-sydney-1');
define('ORACLE_NAMESPACE', 'sdlnnagqepsh');


function get_oracle_client($endpoint)
{
    $endpoint = "https://".ORACLE_NAMESPACE.".compat.objectstorage.".ORACLE_REGION.".oraclecloud.com/{$endpoint}";

    return new Aws\S3\S3Client(array(
        'credentials' => [
            'key' => ORACLE_ACCESS_KEY,
            'secret' => ORACLE_SECRET_KEY,
        ],
        'version' => 'latest',
        'region' => ORACLE_REGION,
        'bucket_endpoint' => true,
        'endpoint' => $endpoint
    ));
}

function upload_file_oracle($bucket_name, $folder_name = '', $file_name)
{
    if (empty(trim($bucket_name))) {
        return array('success' => false, 'message' => 'Please provide valid bucket name!');
    }

    if (empty(trim($file_name))) {
        return array('success' => false, 'message' => 'Please provide valid file name!');
    }

    if ($folder_name !== '') {
        $keyname = $folder_name . '/' . $file_name;
        $endpoint =  "{$bucket_name}/";
    } else {
        $keyname = $file_name;
        $endpoint =  "{$bucket_name}/{$keyname}";
    }

   
    $s3 = get_oracle_client($endpoint);
    $s3->getEndpoint();
    
    $file_url = "https://objectstorage.".ORACLE_REGION.".oraclecloud.com/n/".ORACLE_NAMESPACE."/b/{$bucket_name}/o/{$keyname}";
    try {
        $s3->putObject(array(
            'Bucket' => $bucket_name,
            'Key' => $keyname,
            'SourceFile' => $file_name,
            'StorageClass' => 'REDUCED_REDUNDANCY'
        ));

        return array('success' => true, 'message' => $file_url);
    } catch (S3Exception $e) {
        return array('success' => false, 'message' => $e->getMessage());
    } catch (Exception $e) {
        return array('success' => false, 'message' => $e->getMessage());
    }
}

function upload_folder_oracle($bucket_name, $folder_name)
{
    if (empty(trim($bucket_name))) {
        return array('success' => false, 'message' => 'Please provide valid bucket name!');
    }

    if (empty(trim($folder_name))) {
        return array('success' => false, 'message' => 'Please provide valid folder name!');
    }

    $keyname = $folder_name;
    $endpoint =  "{$bucket_name}/{$keyname}";
    $s3 = get_oracle_client($endpoint);

    try {
        $manager = new \Aws\S3\Transfer($s3, $keyname, 's3://' . $bucket_name . '/' . $keyname);
        $manager->transfer();
        return array('success' => true);
    } catch (S3Exception $e) {
        return array('success' => false, 'message' => $e->getMessage());
    } catch (Exception $e) {
        return array('success' => false, 'message' => $e->getMessage());
    }
}