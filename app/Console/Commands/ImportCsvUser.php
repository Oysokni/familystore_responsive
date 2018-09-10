<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\LimeUser;
use Carbon\Carbon;

class ImportCsvUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update lime user information to database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $file = public_path() . '/storage/downloads/lime_userdata_dtc.csv';

        $limeUserArr = $this->csvToArray($file);
        foreach ($limeUserArr as $data) {
            $limeUser = LimeUser::find($data[0] . '00');

            if (!$limeUser) {
                $limeUser = new LimeUser();
                $limeUser->global_id = (string) $data[0] . '00';
            }

            $limeUser->shain_no = (string) $data[1];
            $limeUser->e_mail = isset($data [2]) ? (string) $data[2] : null;
            $limeUser->user_id = isset($data [3]) ? (string) $data[3] : null;
            $limeUser->name_sei = isset($data [4]) ? (string) $data[4] : null;
            $limeUser->name_mei = isset($data [5]) ? (string) $data[5] : null;
            $limeUser->kana_sei = isset($data [6]) ? (string) $data[6] : null;
            $limeUser->kana_mei = isset($data [7]) ? (string) $data[7] : null;
            $limeUser->name_sei_dsp = isset($data [8]) ? (string) $data[8] : null;
            $limeUser->name_mei_dsp = isset($data [9]) ? (string) $data[9] : null;
            $limeUser->kana_sei_dsp = isset($data [10]) ? (string) $data[10] : null;
            $limeUser->kana_mei_dsp = isset($data [11]) ? (string) $data[11] : null;
            $limeUser->emp_cd = isset($data [12]) ? (string) $data[12] : null;
            $limeUser->title_cd = isset($data [13]) ? (string) $data[13] : null;
            $limeUser->company_cd = isset($data [14]) ? (string) $data[14] : null;
            $limeUser->company_name = isset($data [15]) ? (string) $data[15] : null;
            $limeUser->n_tel = isset($data [16]) ? (string) $data[16] : null;
            $limeUser->g_tel = isset($data [17]) ? (string) $data[17] : null;
            $limeUser->mobile_tel = isset($data [18]) ? (string) $data [18] : null;
            $limeUser->begin_date = $data [19] != '' ? Carbon::createFromFormat('Ymd', $data [19])->format('Y-m-d') : null;
            $limeUser->end_date = $data [20] != '' ? Carbon::createFromFormat('Ymd', $data [20])->format('Y-m-d') : null;

            if (!$limeUser->save()) {
                continue;
            }
        }
    }

    /**
     *
     * @param string $filename
     * @param string $delimiter
     * @return Array
     */
    public function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename)) {
            return false;
        }

        $header = null;
        $data = [];
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                $data[] = $row;
            }
            fclose($handle);
        }

        return $data;
    }

}
