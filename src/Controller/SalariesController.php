<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Session;
use Cake\I18n\Time;
use Cake\Http\ServerRequest;
use Cake\Mailer\Email;
use Cake\Mailer\TransportFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Cake\Mailer\MailerAwareTrait;
use CakePdf\Pdf\CakePdf;

class SalariesController extends AppController
{
    use MailerAwareTrait;
    public function initialize() {
        parent::initialize();
    }

    public function index() {
        if ($this->request->is('ajax')) {
            $data = $this->request->getData();
            $arrDataExcels = $this->getRequest()->getSession()->read('arrDataExcel');
            $path = $this->pdfCommon($arrDataExcels[$data['id']-1], $data['month']);
            if (file_exists($path)) {
                $this->sendMail($data, $arrDataExcels[$data['id']-1][1], $arrDataExcels[$data['id']-1][2], $path);
                $this->ajaxCommon(200, 'ok');
            }
        }
    }

    public function pdfCommon($data = [], $month)
    {
        try {
            $CakePdf = new CakePdf();
            $CakePdf->template('newsletter', 'default');
            $CakePdf->viewVars(['data' => $data, 'month'=> $month]);
            $CakePdf->output();
            $CakePdf->write('salary.pdf');

            return 'C:\xampp\htdocs\Cake-Training\tmp\salary.pdf';

        } catch (\Exception $e) {
            return '';
        }
    }
    /**
     * load file excel when user click import
     *
     * @return ajax
     */
    public function loadFileImport() {
        $this->autoRender = false;

        $session = $this->getRequest()->getSession();
        $session->delete('arrDataExcel');

        $file = $this->request->getData('file');
        $dataFile = $this->readFileExcelCommon($file['tmp_name']);

        array_shift($dataFile);

        $session->write('arrDataExcel', $dataFile);

        return $this->ajaxCommon(200, $dataFile);
    }

    // sendMail($data)
    public function sendMail($data,$receiver, $to, $attachment)
    {
        $this->autoRender = false;

        $dataMail = [
            'host' => $data['host'],
            'from' => $data['email_sender'],
            'sender' => $data['sender'],
            'password' => $data['password'],
            'company' => $data['company'],
            'phone' => $data['phone'],
            'month' => $data['month'],
            'title' => $data['title'],
            'receiver' => $receiver,
            'attachment' => $attachment,
            'to' => $to
        ];

        try {
            $this->getMailer('MailCommon')->send('salary', [$dataMail]);
        } catch (\Exception $e) {
            unlink($attachment);
        }
    }
    /**
     * read file excel common
     *
     * @param $file: path
     *
     * @return Array
     */
    public function readFileExcelCommon($file) {
        try {
            $loadFile = IOFactory::load($file);
            $dataFile = $loadFile->getActiveSheet()->toArray();

            return $dataFile;
        } catch (\Exception $exp) {
            return [];
        }
    }

    public function ajaxCommon($statusCode = 200, $data = []) {
        $this->autoRender = true;
        $this->response = $this->response->withType('json')
            ->withStatus($statusCode)
            ->withStringBody(json_encode($data));

        return $this->response;
    }
}
