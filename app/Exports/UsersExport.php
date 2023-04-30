<?php

namespace App\Exports;

use Illuminate\Support\Facades\Config;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;       
    }  
    public function collection()
    {
        $users = new User();
        $type ='';
        // dd($this->data);
        $users = $users->search($this->data, $type);
        if($users){
            $users = $users->map(function ($user) {
                if($user->birth != '') {
                    $user->birth = date('d/m/Y', strtotime($user->birth));
                } 
                else {
                    $user->birth = '';
                }
                $last_order = $user->order->last()->created_at ?? '' ;
                if($last_order != '') {
                    $last_order = date('d/m/Y', strtotime($last_order));
                } 
                else {
                    $last_order = '';
                }
                $roleAdmin = Config::get('constant.values.role.admin');
                $roleAdminName = Config::get('constant.values.name.admin');
                $roleUserName = Config::get('constant.values.name.user');
                if($user->user_flg == $roleAdmin){
                    $user->user_flg = $roleAdminName;
                } 
                else {
                    $user->user_flg = $roleUserName;
                }
                return [
                    'id' => $user->id,
                    'name' => $user->firstname . ' ' . $user->lastname,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'birth' => $user->birth,
                    'role' => $user->user_flg,
                    'information'=>$user->information ??'',
                    'last_order' => $last_order
                ];
            });
            return $users;
        } 
        else {
            return false;
        }
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A1:B1';
                $color = '93ccea';
                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()->setRGB($color);
            }
        ];
    }

    public function headings(): array
    {
        return ['id', 'name', 'email','phone','birth','role','information','last_order'];
    }

    public function columnWidths(): array
    {
        return [
            'id' => 5,
            'name' => 10,
            'email'=>20,
            'phone'=>10,
            'birth'=>10,
            'role'=>10,           
            'information'=>20,
            'last_order'=>10,
        ];
    }
}
