<?php

namespace App\Http\Controllers;

use App\Models\QrCode as ModelsQrCode;
use chillerlan\QRCode\QRCode;
use Inertia\Inertia;

class QrCodeController extends Controller
{
    public function index()
    {
        $qrCodes = ModelsQrCode::select('id', 'code')->paginate(10);

        foreach ($qrCodes as $qrCode) {
            $fullUrl = url("/verify/{$qrCode->code}");
            $qrCode->code = (new QRCode)->render($fullUrl);
        }

        return Inertia::render('qrcode/index', compact('qrCodes'));
    }

    public function show(ModelsQrCode $qrcode)
    {
        $fullUrl = url("/verify/{$qrcode->code}");
        $qrcode->code = (new QRCode)->render($fullUrl);

        return Inertia::render('qrcode/show', compact('qrcode'));
    }
}
