<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ScheduleModel;
use Exception;

class ScheduleController extends Controller
{
    protected $schedule;
    public $response = [];



    public function __construct(Request $request)
    {
        $this->schedule = new ScheduleModel();
        $this->request = $request;
    }

    public function index()
    {
        $data = $this->get();
        return view('welcome', ['data' => $data['data']['schedule']]);
    }

    public function create()
    {
        try {
            $this->schedule->description = $this->request->json('description');
            $this->schedule->save();
            $this->response['code'] = 201;
            $this->response['message'] = 'success add new schedule';
            $this->response['data'] = $this->schedule;
        } catch (Exception $e) {
            $this->errResponse($e, 'gagal menambahkan jadwal');
        }

        return $this->response;
    }

    public function delete()
    {
        try {
            $ids = explode(',', $this->request->id);
            $this->schedule->whereIn('id', $ids)->delete();
            $this->response['code'] = 200;
            $this->response['message'] = 'success delete schedule';
        } catch (Exception $e) {
            $this->errResponse($e, 'gagal menghapus jadwal');
        }
        return $this->response;
    }

    public function get()
    {
        try {
            $this->response['code'] = 200;
            $this->response['message'] = 'success get all Schedule';
            $this->response['data']['schedule'] = $this->schedule->get();
        } catch (Exception $e) {
            $this->errResponse($e, 'gagal mendapatkan list jadwal');
        }
        return $this->response;
    }

    private function errResponse($e, $message)
    {
        $this->response['code'] = 500;
        $this->response['message'] = $message;
        $this->response['err_message'] = $e->getMessage() . "Line:" . $e->getLine() . "File:" . $e->getFile();
    }
}
