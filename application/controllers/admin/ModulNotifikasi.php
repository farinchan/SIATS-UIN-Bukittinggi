<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModulNotifikasi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    require APPPATH . 'libraries/phpmailer/src/Exception.php';
    require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
    require APPPATH . 'libraries/phpmailer/src/SMTP.php';

    $this->load->model('admin/Model_Alumni');
    $this->load->library('email');
    $this->load->library('Guzzle_PHP_HTTP');
    $this->load->library('Curl');

    $this->load->model('admin/Model_Alumni');
    $this->load->model('admin/Model_Berita');
    $this->load->model('admin/Model_Donasi');
    $this->load->model('admin/Model_Setting');
    $this->load->model('admin/Model_Dashboard');
    $this->load->model('admin/Model_Notifikasi');
    $this->load->model('admin/Model_Penilaian');

    if (!$this->session->userdata('username_session')) {

      redirect(base_url('admin/login'));
    }

    $data = array(
      'total_alumni_acc' => $this->Model_Alumni->total_alumni_acc(),
      'beritabelumacc' => $this->Model_Berita->beritabelumacc(),
      'donasiproses' => $this->Model_Donasi->donasi_diproses(),
      'profil' => $this->Model_Setting->getProfil()->result()

    );

    $this->load->view('admin/partisi/sidebar.php', $data, TRUE);


    $datanav = array(
      'log_update_alumni' => $this->Model_Alumni->getlogupdatealumniLimit(),
      'log_update_alumni_total' => $this->Model_Alumni->logupdatealumnitotal(),
    );

    $this->load->view('admin/partisi/navbar.php', $datanav, TRUE);
  }

  public function alumni()
  {
    $this->session->set_flashdata('location', "notifikasi alumni");

    $data = array(
      'totalalumni' => $this->Model_Dashboard->getAlumni()->num_rows(),
      'totalberita' => $this->Model_Dashboard->getBerita()->num_rows(),
      'totaltopik' => $this->Model_Dashboard->getTopik()->num_rows(),
      'totaldonasi' => $this->Model_Dashboard->getDonasi()->num_rows(),
      'transaksi' => $this->Model_Dashboard->getTransaksi()->result(),
      'notifikasi_configuration' => $this->Model_Notifikasi->get_configuration(1),
      'log_notifikasi' => $this->Model_Notifikasi->logNotifikasiAlumni()
    );

    $this->load->view('admin/notifikasi/contentalumni.php', $data, TRUE);
    $this->load->view('admin/notifikasi/notifikasi.php', $data, FALSE);
  }
  public function pengguna()
  {
    $this->session->set_flashdata('location', "notifikasi pengguna");

    $data = array(
      'totalalumni' => $this->Model_Dashboard->getAlumni()->num_rows(),
      'totalberita' => $this->Model_Dashboard->getBerita()->num_rows(),
      'totaltopik' => $this->Model_Dashboard->getTopik()->num_rows(),
      'totaldonasi' => $this->Model_Dashboard->getDonasi()->num_rows(),
      'transaksi' => $this->Model_Dashboard->getTransaksi()->result(),
      'notifikasi_configuration' => $this->Model_Notifikasi->get_configuration(1),
      'log_notifikasi' => $this->Model_Notifikasi->logNotifikasiPengguna()
    );

    $this->load->view('admin/notifikasi/contentpengguna.php', $data, TRUE);
    $this->load->view('admin/notifikasi/notifikasi.php', $data, FALSE);
  }
  public function configuration()
  {
    $this->session->set_flashdata('location', "notifikasi setting");

    $data = array(
      'totalalumni' => $this->Model_Dashboard->getAlumni()->num_rows(),
      'totalberita' => $this->Model_Dashboard->getBerita()->num_rows(),
      'totaltopik' => $this->Model_Dashboard->getTopik()->num_rows(),
      'totaldonasi' => $this->Model_Dashboard->getDonasi()->num_rows(),
      'transaksi' => $this->Model_Dashboard->getTransaksi()->result(),
      'notifikasi_configuration' => $this->Model_Notifikasi->get_configuration(1)
    );

    $this->load->view('admin/notifikasi/configuration.php', $data, TRUE);
    $this->load->view('admin/notifikasi/notifikasi.php', $data, FALSE);
  }

  public function NotificationConfiguration()
  {
    $data = array(
      'wa_url' => $this->input->post('wa_url'),
      'wa_apikey' => $this->input->post('wa_apikey'),
      'wa_sender' => $this->input->post('wa_sender'),
      'smtp_host' => $this->input->post('smtp_host'),
      'smtp_port' => $this->input->post('smtp_port'),
      'smtp_user' => $this->input->post('smtp_user'),
      'smtp_pass' => $this->input->post('smtp_pass'),
    );
    $this->Model_Notifikasi->update_configuration(1, $data);
    redirect(base_url('admin/ModulNotifikasi/configuration'));
  }
  public function NotificationConfiguration1()
  {
    $data = array(
      // 'pesan_otomatis' => $this->input->post('pesan_otomatis'),
      'pesan_otomatis_label' => $this->input->post('pesan_otomatis_label'),
      'pesan_otomatis_isi' => $this->input->post('pesan_otomatis_isi'),
    );
    $this->Model_Notifikasi->update_configuration(1, $data);
    redirect(base_url('admin/ModulNotifikasi/configuration'));
  }
  public function NotificationConfiguration2()
  {
    $data = array(
      // 'pesan_otomatis_atasan' => $this->input->post('pesan_otomatis_atasan'),
      'pesan_otomatis_atasan_label' => $this->input->post('pesan_otomatis_atasan_label'),
      'pesan_otomatis_atasan_isi' => $this->input->post('pesan_otomatis_atasan_isi'),
    );
    $this->Model_Notifikasi->update_configuration(1, $data);
    redirect(base_url('admin/ModulNotifikasi/configuration'));
  }

  public function searchUser()
  {
    header('Content-Type: application/json');

    $keyword = $this->input->get('keyword');
    $results = $this->Model_Alumni->searchAlumnibyNama($keyword); // Ganti YourModel dengan nama model Anda dan searchData dengan method pencarian Anda

    $response = [];
    foreach ($results as $result) {
      $data = null;
      $data["nama"] = $result->nama_alumni;
      $data["nia"] = $result->nisn;
      array_push($response, $data);
    };
    echo json_encode($response, JSON_PRETTY_PRINT);
  }
  public function searchPengguna()
  {
    header('Content-Type: application/json');

    $keyword = $this->input->get('keyword');
    $results = $this->Model_Penilaian->searchpenggunabyNama($keyword); // Ganti YourModel dengan nama model Anda dan searchData dengan method pencarian Anda

    $response = [];
    foreach ($results as $result) {
      $data = null;
      $data["nama"] = $result->nama;
      $data["instansi"] = $result->instansi_lembaga;
      array_push($response, $data);
    };
    echo json_encode($response, JSON_PRETTY_PRINT);
  }

  public function saveNotifikasi()
  {
    header('Content-Type: application/json');

    $client = new \GuzzleHttp\Client();
    $notification_configuration = $this->Model_Notifikasi->get_configuration(1);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $this->input->raw_input_stream) {
      $data = json_decode($this->input->raw_input_stream);

      $transformedData = [
        'nisn' => [],
        'nama_alumni' => [],
        'no_wa' => [],
        'email' => []
      ];
      $filter = json_decode($data->kirim_kepada);
      foreach ($filter as $nisn) {
        $alumni = $this->Model_Alumni->getAlumni($nisn)->row();

        if ($data->dikirim_untuk == "atasan_alumni") {
          $check_tracer = $this->Model_Alumni->tracer_if_exist($nisn);
          if ($check_tracer) {
            $tracer = $this->Model_Alumni->getTracerAlumni($nisn)->row();
            if ($tracer) {
              $nomor_wa = $tracer->wa_atasan;

              // Menghapus simbol '+' dari awal nomor telepon
              if (substr($nomor_wa, 0, 1) === '+') {
                $nomor_wa = substr($nomor_wa, 1);
              }

              // Mengganti angka 0 di awal dengan 62
              if (substr($nomor_wa, 0, 1) === '0') {
                $nomor_wa = '62' . substr($nomor_wa, 1);
              }

              $transformedData['nisn'][] = $alumni->nisn;
              $transformedData['nama_alumni'][] = $alumni->nama_alumni;
              $transformedData['no_wa'][] = $tracer->wa_atasan;
              $transformedData['email'][] = $tracer->email_atasan;
            }
          }
        } else {
          if ($alumni) {
            $nomor_wa = $alumni->no_wa;
 
            // Menghapus simbol '+' dari awal nomor telepon
            if (substr($nomor_wa, 0, 1) === '+') {
              $nomor_wa = substr($nomor_wa, 1);
            }

            // Mengganti angka 0 di awal dengan 62
            if (substr($nomor_wa, 0, 1) === '0') {
              $nomor_wa = '62' . substr($nomor_wa, 1);
            }

            $transformedData['nisn'][] = $alumni->nisn;
            $transformedData['nama_alumni'][] = $alumni->nama_alumni;
            $transformedData['no_wa'][] = $nomor_wa;
            $transformedData['email'][] = $alumni->email;
          }
        }
      }
      $transformedData['no_wa'] = implode('|', $transformedData['no_wa']);

      if ($data->whatsapp_notifikasi == true) {

        $post_data = array(
          "api_key" => $notification_configuration->wa_apikey,
          "sender" => $notification_configuration->wa_sender,
          "number" => $transformedData['no_wa'],
          "message" => $data->isi_notifikasi
        );

        try {
          $response = $client->request('POST', $notification_configuration->wa_url, [
            'form_params' => $post_data
          ]);

          $response_status = $response->getStatusCode(); # 200
          if ($response_status == 200) {
            $waResStatus = true;
            $waResStatusCode =  $response_status;
            $waResMessage = $response->getBody();
          }
        } catch (GuzzleHttp\Exception\RequestException $e) {
          if ($e->hasResponse()) {
            $response = $e->getResponse();
            $waResStatus = false;
            $waResStatusCode = $response->getStatusCode();
            $waResMessage = $e->getMessage();
          }
        }
      } else {
        $waResStatus = false;
        $waResStatusCode =  0;
        $waResMessage = "Whatsapp Notification Not Active";
      }

      if ($data->email_notifikasi == true) {

        // PHPMailer object
        $response = false;
        $mail =  new PHPMailer\PHPMailer\PHPMailer();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'mail.ikapetikom.or.id'; //sesuaikan sesuai nama domain hosting/server yang digunakan
        $mail->SMTPAuth = true;
        $mail->Username = 'info@ikapetikom.or.id'; // user email
        $mail->Password = 'YDvGPKakSTrw71'; // password email
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->Timeout = 60; // timeout pengiriman (dalam detik)
        $mail->SMTPKeepAlive = true;

        $mail->setFrom('info@ikapetikom.or.id', 'Info Ikapetikom'); // user email

        foreach ($transformedData['email'] as $email) {
          $mail->addAddress($email); //email tujuan pengiriman email
        }

        // Email subject
        $mail->Subject = $data->label_notifikasi; //subject email

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        // $mailContent = "<h1>SMTP Codeigniterr</h1>
        // <p>Laporan email SMTP Codeigniter.</p>"; // isi email
        $mail->Body = $data->isi_notifikasi;

        // Send email
        if (!$mail->send()) {
          $emailResStatus = false;
          $emailResStatusCode =  0;
          $emailResMessage = 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
          $emailResStatus = true;
          $emailResStatusCode =  200;
          $emailResMessage = "Message has been sent";
        }
      } else {
        $emailResStatus = false;
        $emailResStatusCode =  0;
        $emailResMessage = "Email Notification Not Active";
      }

      $data = array(
        "label" => $data->label_notifikasi,
        "isi" => $data->isi_notifikasi,
        "kepada" => $data->kirim_kepada,
        "status_kepada" => $data->dikirim_untuk,
        "pengirim" => $this->session->userdata('username_session'),
        "wa_status" => $waResStatus,
        "email_status" => $emailResStatus,

      );
      $this->Model_Notifikasi->addlogNotifikasiAlumni($data);

      echo json_encode([
        'status' => "success",
        'whatsapp' => [
          'no' => $transformedData['no_wa'],
          'status' => $waResStatus,
          'statusCode' => $waResStatusCode,
          'message' => $waResMessage
        ],
        'email' => [
          'address' => $transformedData['email'],
          'status' => $emailResStatus,
          'statusCode' => $emailResStatusCode,
          'message' => $emailResMessage
        ],
      ], JSON_PRETTY_PRINT);
    };
  }

  function notifikasicepat1()
  {
    header('Content-Type: application/json');

    $alumni_list = $this->Model_Alumni->get_all_alumni_incomplete();
    $client = new \GuzzleHttp\Client();
    $notification_configuration = $this->Model_Notifikasi->get_configuration(1);

    $transformedData = [
      'nisn' => [],
      'nama_alumni' => [],
      'no_wa' => [],
      'email' => []
    ];
    foreach ($alumni_list as $alumni) {
      $nomor_wa = $alumni->no_wa;

      // Menghapus simbol '+' dari awal nomor telepon
      if (substr($nomor_wa, 0, 1) === '+') {
        $nomor_wa = substr($nomor_wa, 1);
      }

      // Mengganti angka 0 di awal dengan 62
      if (substr($nomor_wa, 0, 1) === '0') {
        $nomor_wa = '62' . substr($nomor_wa, 1);
      }

      $transformedData['nisn'][] = $alumni->nisn;
      $transformedData['nama_alumni'][] = $alumni->nama_alumni;
      $transformedData['no_wa'][] = $nomor_wa;
      $transformedData['email'][] = $alumni->email;
    }
    $transformedData['no_wa'] = implode('|', $transformedData['no_wa']);

    $post_data = array(
      "api_key" => $notification_configuration->wa_apikey,
      "sender" => $notification_configuration->wa_sender,
      // "number" => $transformedData['no_wa'],
      "number" => "6289613390766", //FIXME: INI MASIH CONTOH
      "message" => "Ini Adalah Contoh Notifikasi Cepat, Untuk Yang Belum Melengkapi Data"
    );

    try {
      $response = $client->request('POST', $notification_configuration->wa_url, [
        'form_params' => $post_data
      ]);

      $response_status = $response->getStatusCode(); # 200
      if ($response_status == 200) {
        $waResStatus = true;
        $waResStatusCode =  $response_status;
        $waResMessage = $response->getBody();
      }
    } catch (GuzzleHttp\Exception\RequestException $e) {
      if ($e->hasResponse()) {
        $response = $e->getResponse();
        $waResStatus = false;
        $waResStatusCode = $response->getStatusCode();
        $waResMessage = $e->getMessage();
      }
    }

    echo json_encode([
      'status' => "success",
      'whatsapp' => [
        'no' => $transformedData['no_wa'],
        'status' => $waResStatus,
        'statusCode' => $waResStatusCode,
        'message' => $waResMessage
      ],
      'email' => [
        'address' => $transformedData['email'],
        'status' => false,
        'statusCode' => 0,
        'message' => "bad"
      ],
    ], JSON_PRETTY_PRINT);
  }

  function email()
  {

    // PHPMailer object
    $response = false;
    $mail =  new PHPMailer\PHPMailer\PHPMailer();

    // SMTP configuration
    $mail->isSMTP();
    $mail->Host     = 'mail.ikapetikom.or.id'; //sesuaikan sesuai nama domain hosting/server yang digunakan
    $mail->SMTPAuth = true;
    $mail->Username = 'info@ikapetikom.or.id'; // user email
    $mail->Password = 'YDvGPKakSTrw71'; // password email
    $mail->SMTPSecure = 'ssl';
    $mail->Port     = 465;

    $mail->Timeout = 60; // timeout pengiriman (dalam detik)
    $mail->SMTPKeepAlive = true;

    $mail->setFrom('info@ikapetikom.or.id'); // user email
    // $mail->addReplyTo('xxx@hostdomain.com', ''); //user email

    // Add a recipient
    $mail->addAddress('fajririnaldichan@gmail.com'); //email tujuan pengiriman email
    $mail->addAddress('fajarrivaldi2015@gmail.com');

    // Email subject
    $mail->Subject = 'SMTP Codeigniter'; //subject email

    // Set email format to HTML
    $mail->isHTML(true);

    // Email body content
    $mailContent = `<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
        <head>
        <!--[if gte mso 9]>
        <xml>
          <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
          </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta name="x-apple-disable-message-reformatting">
          <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
          <title></title>
          
            <style type="text/css">
              @media only screen and (min-width: 620px) {
          .u-row {
            width: 600px !important;
          }
          .u-row .u-col {
            vertical-align: top;
          }
        
          .u-row .u-col-36p67 {
            width: 220.02px !important;
          }
        
          .u-row .u-col-63p33 {
            width: 379.98px !important;
          }
        
          .u-row .u-col-100 {
            width: 600px !important;
          }
        
        }
        
        @media (max-width: 620px) {
          .u-row-container {
            max-width: 100% !important;
            padding-left: 0px !important;
            padding-right: 0px !important;
          }
          .u-row .u-col {
            min-width: 320px !important;
            max-width: 100% !important;
            display: block !important;
          }
          .u-row {
            width: 100% !important;
          }
          .u-col {
            width: 100% !important;
          }
          .u-col > div {
            margin: 0 auto;
          }
        }
        body {
          margin: 0;
          padding: 0;
        }
        
        table,
        tr,
        td {
          vertical-align: top;
          border-collapse: collapse;
        }
        
        p {
          margin: 0;
        }
        
        .ie-container table,
        .mso-container table {
          table-layout: fixed;
        }
        
        * {
          line-height: inherit;
        }
        
        a[x-apple-data-detectors='true'] {
          color: inherit !important;
          text-decoration: none !important;
        }
        
        table, td { color: #000000; } #u_body a { color: #0000ee; text-decoration: underline; } @media (max-width: 480px) { #u_content_heading_1 .v-container-padding-padding { padding: 30px 10px 10px !important; } #u_content_heading_1 .v-font-size { font-size: 14px !important; } #u_content_divider_1 .v-container-padding-padding { padding: 10px 20px !important; } #u_content_text_1 .v-container-padding-padding { padding: 20px 20px 30px !important; } #u_content_heading_3 .v-container-padding-padding { padding: 30px 20px 10px !important; } #u_content_heading_3 .v-text-align { text-align: center !important; } #u_content_text_2 .v-container-padding-padding { padding: 0px 20px 10px !important; } #u_content_text_2 .v-text-align { text-align: center !important; } #u_content_social_1 .v-container-padding-padding { padding: 10px 0px 10px 75px !important; } #u_content_text_3 .v-container-padding-padding { padding: 10px 0px !important; } #u_content_text_3 .v-font-size { font-size: 13px !important; } #u_content_text_3 .v-text-align { text-align: center !important; } #u_content_image_3 .v-container-padding-padding { padding: 20px 0px !important; } #u_content_image_3 .v-src-width { width: auto !important; } #u_content_image_3 .v-src-max-width { max-width: 49% !important; } #u_content_image_3 .v-text-align { text-align: center !important; } }
            </style>
          
          
        
        </head>
        
        <body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #e7e7e7;color: #000000">
          <!--[if IE]><div class="ie-container"><![endif]-->
          <!--[if mso]><div class="mso-container"><![endif]-->
          <table id="u_body" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #e7e7e7;width:100%" cellpadding="0" cellspacing="0">
          <tbody>
          <tr style="vertical-align: top">
            <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #e7e7e7;"><![endif]-->
            
          
          
        <div class="u-row-container" style="padding: 0px;background-color: transparent">
          <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
            <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
              <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->
              
        <!--[if (mso)|(IE)]><td align="center" width="600" style="background-color: #ffffff;width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
        <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
          <div style="background-color: #ffffff;height: 100%;width: 100% !important;">
          <!--[if (!mso)&(!IE)]><!--><div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->
          
        <table id="u_content_heading_1" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:40px 10px 10px;font-family:arial,helvetica,sans-serif;" align="left">
                
          <h1 class="v-text-align v-font-size" style="margin: 0px; line-height: 140%; text-align: center; word-wrap: break-word; font-size: 17px; font-weight: 400;"><strong>Sistem Informasi Alumni &amp; Tracer Study</strong><br />Program Studi PTIK UIN Bukittinggi</h1>
        
              </td>
            </tr>
          </tbody>
        </table>
        
        <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:20px 0px 0px;font-family:arial,helvetica,sans-serif;" align="left">
                
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td class="v-text-align" style="padding-right: 0px;padding-left: 0px;" align="center">
              
              <img align="center" border="0" src="images/image-5.png" alt="image" title="image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 530px;" width="530" class="v-src-width v-src-max-width"/>
              
            </td>
          </tr>
        </table>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
          </div>
          
        
        
          
          
        <div class="u-row-container" style="padding: 0px;background-color: transparent">
          <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
            <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
              <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->
              
        <!--[if (mso)|(IE)]><td align="center" width="600" style="background-color: #ffffff;width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
        <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
          <div style="background-color: #ffffff;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
          <!--[if (!mso)&(!IE)]><!--><div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;"><!--<![endif]-->
          
        <table id="u_content_divider_1" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:10px 48px;font-family:arial,helvetica,sans-serif;" align="left">
                
          <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #000000;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
            <tbody>
              <tr style="vertical-align: top">
                <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                  <span>&#160;</span>
                </td>
              </tr>
            </tbody>
          </table>
        
              </td>
            </tr>
          </tbody>
        </table>
        
        <table id="u_content_text_1" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:20px 90px 30px 60px;font-family:arial,helvetica,sans-serif;" align="left">
                
          <div class="v-text-align v-font-size" style="font-size: 14px; line-height: 140%; text-align: left; word-wrap: break-word;">
            <p style="line-height: 140%;">ini tempat nya</p>
          </div>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
          </div>
          
        
        
          
          
        <div class="u-row-container" style="padding: 0px;background-color: transparent">
          <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
            <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
              <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->
              
        <!--[if (mso)|(IE)]><td align="center" width="600" style="background-color: #242424;width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
        <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
          <div style="background-color: #242424;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
          <!--[if (!mso)&(!IE)]><!--><div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;"><!--<![endif]-->
          
        <table id="u_content_heading_3" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:40px 10px 10px 35px;font-family:arial,helvetica,sans-serif;" align="left">
                
          <h1 class="v-text-align v-font-size" style="margin: 0px; color: #ffffff; line-height: 140%; text-align: left; word-wrap: break-word; font-size: 22px; font-weight: 400;">SIATS IKAPETIKOM</h1>
        
              </td>
            </tr>
          </tbody>
        </table>
        
        <table id="u_content_text_2" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:0px 60px 10px 35px;font-family:arial,helvetica,sans-serif;" align="left">
                
          <div class="v-text-align v-font-size" style="font-size: 13px; color: #ffffff; line-height: 170%; text-align: left; word-wrap: break-word;">
            <p style="line-height: 170%;"><span data-metadata="&lt;!--(figmeta)eyJmaWxlS2V5IjoiMlBQSXNjNFd3Q2ZlU0tINFZVMlBXeiIsInBhc3RlSUQiOjE5NDM5MjkyMjcsImRhdGFUeXBlIjoic2NlbmUifQo=(/figmeta)--&gt;" style="line-height: 22.1px;"></span>Sistem Informasi Alumni dan Tracer Study<br />Program Studi Pendidikan Teknik Informatika dan Komputer UIN SMDD Bukittinggi<br /><br /></p>
          </div>
        
              </td>
            </tr>
          </tbody>
        </table>
        
        <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:10px 35px;font-family:arial,helvetica,sans-serif;" align="left">
                
          <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #d3d3d3;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
            <tbody>
              <tr style="vertical-align: top">
                <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                  <span>&#160;</span>
                </td>
              </tr>
            </tbody>
          </table>
        
              </td>
            </tr>
          </tbody>
        </table>
        
        <table id="u_content_social_1" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 10px 35px;font-family:arial,helvetica,sans-serif;" align="left">
                
        <div align="left">
          <div style="display: table; max-width:167px;">
          <!--[if (mso)|(IE)]><table width="167" cellpadding="0" cellspacing="0" border="0"><tr><td style="border-collapse:collapse;" align="left"><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse; mso-table-lspace: 0pt;mso-table-rspace: 0pt; width:167px;"><tr><![endif]-->
          
            
            <!--[if (mso)|(IE)]><td width="32" style="width:32px; padding-right: 10px;" valign="top"><![endif]-->
            <table align="left" border="0" cellspacing="0" cellpadding="0" width="32" height="32" style="width: 32px !important;height: 32px !important;display: inline-block;border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 10px">
              <tbody><tr style="vertical-align: top"><td align="left" valign="middle" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                <a href="https://www.facebook.com/Ikapetikom/" title="Facebook" target="_blank">
                  <img src="images/image-1.png" alt="Facebook" title="Facebook" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                </a>
              </td></tr>
            </tbody></table>
            <!--[if (mso)|(IE)]></td><![endif]-->
            
            <!--[if (mso)|(IE)]><td width="32" style="width:32px; padding-right: 10px;" valign="top"><![endif]-->
            <table align="left" border="0" cellspacing="0" cellpadding="0" width="32" height="32" style="width: 32px !important;height: 32px !important;display: inline-block;border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 10px">
              <tbody><tr style="vertical-align: top"><td align="left" valign="middle" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                <a href="https://twitter.com/" title="Twitter" target="_blank">
                  <img src="images/image-2.png" alt="Twitter" title="Twitter" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                </a>
              </td></tr>
            </tbody></table>
            <!--[if (mso)|(IE)]></td><![endif]-->
            
            <!--[if (mso)|(IE)]><td width="32" style="width:32px; padding-right: 10px;" valign="top"><![endif]-->
            <table align="left" border="0" cellspacing="0" cellpadding="0" width="32" height="32" style="width: 32px !important;height: 32px !important;display: inline-block;border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 10px">
              <tbody><tr style="vertical-align: top"><td align="left" valign="middle" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                <a href="https://www.linkedin.com/" title="LinkedIn" target="_blank">
                  <img src="images/image-3.png" alt="LinkedIn" title="LinkedIn" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                </a>
              </td></tr>
            </tbody></table>
            <!--[if (mso)|(IE)]></td><![endif]-->
            
            <!--[if (mso)|(IE)]><td width="32" style="width:32px; padding-right: 0px;" valign="top"><![endif]-->
            <table align="left" border="0" cellspacing="0" cellpadding="0" width="32" height="32" style="width: 32px !important;height: 32px !important;display: inline-block;border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 0px">
              <tbody><tr style="vertical-align: top"><td align="left" valign="middle" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                <a href="https://www.instagram.com/ikapetikom_or_id/" title="Instagram" target="_blank">
                  <img src="images/image-4.png" alt="Instagram" title="Instagram" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                </a>
              </td></tr>
            </tbody></table>
            <!--[if (mso)|(IE)]></td><![endif]-->
            
            
            <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
          </div>
        </div>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
          </div>
          
        
        
          
          
        <div class="u-row-container" style="padding: 0px;background-color: transparent">
          <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
            <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
              <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->
              
        <!--[if (mso)|(IE)]><td align="center" width="379" style="background-color: #242424;width: 379px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
        <div class="u-col u-col-63p33" style="max-width: 320px;min-width: 379.98px;display: table-cell;vertical-align: top;">
          <div style="background-color: #242424;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
          <!--[if (!mso)&(!IE)]><!--><div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;"><!--<![endif]-->
          
        <table id="u_content_text_3" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:20px 10px 20px 30px;font-family:arial,helvetica,sans-serif;" align="left">
                
          <div class="v-text-align v-font-size" style="font-size: 13px; color: #ffffff; line-height: 140%; text-align: left; word-wrap: break-word;">
            <p style="line-height: 140%;">UNSUBSCRIBE   |   PRIVACY POLICY   |   WEB</p>
          </div>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
        <!--[if (mso)|(IE)]><td align="center" width="220" style="background-color: #242424;width: 220px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
        <div class="u-col u-col-36p67" style="max-width: 320px;min-width: 220.02px;display: table-cell;vertical-align: top;">
          <div style="background-color: #242424;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
          <!--[if (!mso)&(!IE)]><!--><div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;"><!--<![endif]-->
          
        <table id="u_content_image_3" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:15px 40px 10px 10px;font-family:arial,helvetica,sans-serif;" align="left">
                
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td class="v-text-align" style="padding-right: 0px;padding-left: 0px;" align="right">
              
              <img align="right" border="0" src="images/image-6.png" alt="image" title="image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 92%;max-width: 156.42px;" width="156.42" class="v-src-width v-src-max-width"/>
              
            </td>
          </tr>
        </table>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
          </div>
          
        
        
            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            </td>
          </tr>
          </tbody>
          </table>
          <!--[if mso]></div><![endif]-->
          <!--[if IE]></div><![endif]-->
        </body>
        
        </html>
        `; // isi email
    $mail->Body = $mailContent;

    // Send email
    if (!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
      echo 'Message has been sent';
    }
  }

  function whatsapp()
  {

    $client = new \GuzzleHttp\Client();

    $api_url = 'https://wa.srv7.wapanels.com/send-message';

    $headers = array(
      'Content-Type: application/json' // Ganti dengan tipe konten yang sesuai
    );

    $post_data = array(
      "api_key" => "45c03d620f05e5dd599d2440de4c73b08f721999",
      "sender" => "6282170655194s",
      "number" => "6289613390766",
      "message" => "Hello World"
    );

    try {
      $response = $client->request('POST', $api_url, [
        'form_params' => $post_data
      ]);

      $response_status = $response->getStatusCode(); # 200

      if ($response_status == 200) {
        $trestle_response = $response->getBody();
        $trestle_response = json_decode($trestle_response, true);

        echo "<pre>";
        print_r($trestle_response);
        echo "</pre>";
      } else {
        echo "<pre>";
        print_r("Gagal");
        echo "</pre>";
        print_r($response->getBody());
      }
    } catch (GuzzleHttp\Exception\RequestException $e) {
      if ($e->hasResponse()) {
        $response = $e->getResponse();
        echo 'Permintaan gagal. Kode status: ' . $response->getStatusCode() . ' Pesan: ' . $response->getReasonPhrase();
        echo 'Permintaan gagal. Pesan: ' . $e->getMessage();
      } else {
      }
    }
  }
}
