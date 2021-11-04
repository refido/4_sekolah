<?php
defined('BASEPATH') or exit('No direct script access allowed');
include("./vendor/autoload.php");

class Keranjang
{
    var $oracle_region = "ap-sydney-1";
    var $oracle_access_key = "79dca448f7dfe562e9cccde8f701cf5fa65fc579";
    var $oracle_secret_key = "xNjtSiQHZQaTEFu0Ffld4PXraRrZKN7ylRC7wVf3eUk=";
    var $oracle_namespace = "sdlnnagqepsh";

    public function update_transaksi()
    {
        $input = $this->input->post();

        $filename = substr(date("Y"), 2, 4) . date("mdHis");

        if (!empty($_FILES['gambar_1']['tmp_name'])) {
            // move_uploaded_file(
            //     $_FILES['gambar_1']['tmp_name'],
            //     './component/bukti_pembayaran/' . 'BT_' . $filename . '.' . pathinfo($_FILES['gambar_1']['name'], PATHINFO_EXTENSION)
            // );
            $gambar1  = 'BT_' . $filename . '.' . pathinfo($_FILES['gambar_1']['name'], PATHINFO_EXTENSION);

            // if ($input['gambar_1_old'] != '') {
            //     $path1   = './component/bukti_pembayaran/' . $input['gambar_1_old'];
            //     unlink($path1);
            // }

            // $this->upload_file_oracle('mrshop-bukti_pembayaran', '', $_FILES['gambar_1']['tmp_name']);
            $bucket_name = "4_sekolah";
            $file_uri = $_FILES['gambar_1']['tmp_name'];

            $keyname = $gambar1;
            $endpoint =  "{$bucket_name}/{$keyname}";
            $s3 = $this->get_oracle_client($endpoint);
            $s3->getEndpoint();

            $file_url = "https://objectstorage." . $this->oracle_region . ".oraclecloud.com/n/" . $this->oracle_namespace . "/b/{$bucket_name}/o/{$keyname}";
            try {
                $s3->putObject(array(
                    'Bucket' => $bucket_name,
                    'Key' => $keyname,
                    'SourceFile' => $file_uri,
                    'ContentType' => 'image/jpeg',
                    'StorageClass' => 'REDUCED_REDUNDANCY'
                ));

                $input2['bukti_transfer'] = $gambar1;
            } catch (S3Exception $e) {
                return array('success' => false, 'message' => $e->getMessage());
            } catch (Exception $e) {
                return array('success' => false, 'message' => $e->getMessage());
            }
            $input2['status'] = 'Menunggu';
        } else {
            $input2['status'] = 'Menunggu';
            unset($input['gambar_1_old']);
        }
        $this->db->where('kode_transaksi', $input['kode_transaksi']);
        $insert = $this->db->update('transaksi', $input2);
        if ($insert) {
            $data['response'] = 'sukses';
        } else {
            $data['response'] = 'gagal';
        }


        echo json_encode($data);
    }


    function get_oracle_client($endpoint)
    {
        $endpoint = "https://" . $this->oracle_namespace . ".compat.objectstorage." . $this->oracle_region . ".oraclecloud.com/{$endpoint}";

        return new Aws\S3\S3Client(array(
            'credentials' => [
                'key' => $this->oracle_access_key,
                'secret' => $this->oracle_secret_key,
            ],
            'version' => 'latest',
            'region' => $this->oracle_region,
            'bucket_endpoint' => true,
            'endpoint' => $endpoint
        ));
    }
}