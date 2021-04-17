<?php

namespace  App\Report;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CustomerReport
{
    public function list($customers)
    {
        set_time_limit(0);
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle(__('cms.report.type.customers'));
        $sheet->getStyle('A1:V1')->getBorders()->getOutline()->setBorderStyle(true);
        $sheet->setCellValue('A1', __('cms.customer.form.status'));
        $sheet->setCellValue('B1', __('cms.customer.form.customer_type'));
        $sheet->setCellValue('C1', __('cms.customer.form.customer_group'));
        $sheet->setCellValue('D1', __('cms.customer.form.customer_profile'));
        $sheet->setCellValue('E1', __('cms.customer.form.customer_gender'));
        $sheet->setCellValue('F1', __('cms.customer.form.registration'));
        $sheet->setCellValue('G1', __('cms.customer.form.name'));
        $sheet->setCellValue('H1', __('cms.customer.form.cpf'));
        $sheet->setCellValue('I1', __('cms.customer.form.birth_date'));
        $sheet->setCellValue('J1', __('cms.customer.form.zip_code'));
        $sheet->setCellValue('K1', __('cms.customer.form.public_place'));
        $sheet->setCellValue('L1', __('cms.customer.form.neighborhood'));
        $sheet->setCellValue('M1', __('cms.customer.form.city'));
        $sheet->setCellValue('N1', __('cms.customer.form.federative_unit'));
        $sheet->setCellValue('O1', __('cms.customer.form.complement'));
        $sheet->setCellValue('P1', __('cms.customer.form.public_place_number'));
        $sheet->setCellValue('Q1', __('cms.customer.form.email'));
        $sheet->setCellValue('R1', __('cms.customer.form.telephone'));
        $sheet->setCellValue('S1', __('cms.customer.form.cellphone'));
        $sheet->setCellValue('T1', __('cms.customer.form.regulation'));
        $sheet->setCellValue('U1', __('cms.log.actions.created_at'));
        $sheet->setCellValue('V1', __('cms.log.actions.updated_at'));
        $line = 2;
        foreach ($customers as $item) {
            $sheet->setCellValueByColumnAndRow(1, $line, $item->customerStatus ? __('cms.customer.enum.' . $item->customerStatus->description) : null);
            $sheet->setCellValueByColumnAndRow(2, $line, $item->customerType ? __('cms.customer.enum.' . $item->customerType->description) : null);
            $sheet->setCellValueByColumnAndRow(3, $line, $item->customerGroup ? $item->customerGroup->description : null);
            $sheet->setCellValueByColumnAndRow(4, $line, $item->customerProfile ? $item->customerProfile->description : null);
            $sheet->setCellValueByColumnAndRow(5, $line, $item->customerGender ? __('cms.customer.enum.' . $item->customerGender->description) : null);
            $sheet->setCellValueByColumnAndRow(6, $line, $item->registration);
            $sheet->setCellValueByColumnAndRow(7, $line, $item->name);
            $sheet->setCellValueByColumnAndRow(8, $line, $item->cpf);
            $sheet->setCellValueByColumnAndRow(9, $line, $item->birth_date ? date('d-m-Y', strtotime($item->birth_date)) : null);
            $sheet->setCellValueByColumnAndRow(10, $line, $item->zip_code);
            $sheet->setCellValueByColumnAndRow(11, $line, $item->public_place);
            $sheet->setCellValueByColumnAndRow(12, $line, $item->neighborhood);
            $sheet->setCellValueByColumnAndRow(13, $line, $item->city);
            $sheet->setCellValueByColumnAndRow(14, $line, $item->federativeUnit ? $item->federativeUnit->description : null);
            $sheet->setCellValueByColumnAndRow(15, $line, $item->complement);
            $sheet->setCellValueByColumnAndRow(16, $line, $item->public_place_number);
            $sheet->setCellValueByColumnAndRow(17, $line, $item->email == $item->registration ? null : $item->email);
            $sheet->setCellValueByColumnAndRow(18, $line, $item->telephone);
            $sheet->setCellValueByColumnAndRow(19, $line, $item->cellphone);
            $sheet->setCellValueByColumnAndRow(20, $line, $item->regulation ? date('d-m-Y H:i:s', strtotime($item->regulation)) : null);
            $sheet->setCellValueByColumnAndRow(21, $line, $item->created_at ? date('d-m-Y H:i:s', strtotime($item->created_at)) : null);
            $sheet->setCellValueByColumnAndRow(22, $line, $item->updated_at ? date('d-m-Y H:i:s', strtotime($item->updated_at)) : null);
            $line++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = "report-" . time() . ".xlsx";
        $writer->save(storage_path('app/public/report/customer/' . $filename));
        $notification = [
            'report'     => true,
            'report_name' => trans('cms.report.singular_name') . " - " . trans('cms.report.type.customers'),
            'report_link' => asset('storage/report/customer/' . $filename),
            'title' => trans('validation.generic.Success'),
            'message' => trans('validation.report.success'),
            'alert-type' => 'success'
        ];
        return $notification;
    }
    public function acceptRegulation($customers)
    {
        $rel_name = __('cms.report.type.customers_accept_regulation');
        $rel_save_path = 'app/public/report/customer/';
        $rel_link = 'storage/report/customer/';
        set_time_limit(0);
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle($rel_name);
        $sheet->getStyle('A1:G1')->getBorders()->getOutline()->setBorderStyle(true);
        $sheet->setCellValue('A1', __('cms.customer.form.status'));
        $sheet->setCellValue('B1', __('cms.customer.report.role'));
        $sheet->setCellValue('C1', __('cms.customer.report.channel'));
        $sheet->setCellValue('D1', __('cms.customer.form.registration'));
        $sheet->setCellValue('E1', __('cms.customer.form.name'));
        $sheet->setCellValue('F1', __('cms.customer.form.regulation'));
        $sheet->setCellValue('G1', __('cms.log.actions.created_at'));
        $line = 2;
        foreach ($customers as $item) {
            $sheet->setCellValueByColumnAndRow(1, $line, $item->customerStatus ? __('cms.customer.enum.' . $item->customerStatus->description) : null);
            $sheet->setCellValueByColumnAndRow(2, $line, $item->customerGroup ? $item->customerGroup->description : null);
            $sheet->setCellValueByColumnAndRow(3, $line, $item->customerProfile ? $item->customerProfile->description : null);
            $sheet->setCellValueByColumnAndRow(4, $line, $item->registration);
            $sheet->setCellValueByColumnAndRow(5, $line, $item->name);
            $sheet->setCellValueByColumnAndRow(6, $line, $item->regulation ? date('d-m-Y H:i:s', strtotime($item->regulation)) : null);
            $sheet->setCellValueByColumnAndRow(7, $line, $item->created_at ? date('d-m-Y H:i:s', strtotime($item->created_at)) : null);
            $line++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = $rel_name."-" . time() . ".xlsx";
        $writer->save(storage_path($rel_save_path . $filename));
        $notification = [
            'report'     => true,
            'report_name' => trans('cms.report.singular_name') . " - " . $rel_name,
            'report_link' => asset( $rel_link . $filename),
            'title' => trans('validation.generic.Success'),
            'message' => trans('validation.report.success'),
            'alert-type' => 'success'
        ];
        return $notification;
    }
}
