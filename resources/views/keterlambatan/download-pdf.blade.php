<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Pernyataan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 1cm;
        }

        .head {
            margin-bottom: 2rem;
            text-align: center;
        }

        h2 {
            font-size: 1.2rem;
            margin: 0;
        }

        .mid {
            margin-bottom: 2rem;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        .proms {
            margin-top: 1rem;
            text-align: justify;
        }

        .date {
            text-align: right;
            margin-top: 1rem;
        }

        .ttd {
            margin-top: 1rem;
            display: flex;
            justify-content: space-between;
        }

        .ttd table {
            width: 100%;
        }

        .ttd td {
            text-align: center;
        }

        .coba {
            padding-top: 6rem;
        }

        .ttd2 {
            margin-top: 3rem;
            display: flex;
            justify-content: space-between;
            margin-left: -4rem;
        }

        .ttd2 table {
            width: 100%;
        }

        .ttd2 td {
            text-align: center;
        }

        #wo {
            padding-left: 7rem;
        }

        #wa {
            padding-left: 2.5rem;
        }
    </style>
</head>

<body class="surat">
    @foreach ($lateByStudent as $studentId => $lateRecords)
        <div class="head">
            <b>
                <h2>SURAT PERNYATAAN<br>TIDAK AKAN DATANG TERLAMBAT KESEKOLAH</h2>
            </b>
        </div>
        <div class="mid">
            <p>Yang bertanda tangan dibawah ini:</p>
            <table>
                @php
                    $countBeforeUnique = $lateRecords->count();
                    $uniqueStudent = $lateRecords->first()->student;
                @endphp
                <tr>
                    <td>NIS</td>
                    <td>: {{ $uniqueStudent->nis }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>: {{ $uniqueStudent->name }}</td>
                </tr>
                <tr>
                    <td>Rombel</td>
                    <td>: {{ $uniqueStudent->rombel->rombel }}</td>
                </tr>
                <tr>
                    <td>Rayon</td>
                    <td>: {{ $uniqueStudent->rayon->rayon }}</td>
                </tr>
            </table>

            <div class="proms">
                <p>Dengan ini menyatakan bahwa saya telah melakukan pelanggaran tata tertib sekolah, yaitu terlambat datang
                    ke sekolah sebanyak <b>{{ $countBeforeUnique }}</b> kali yang mana hal tersebut termasuk kedalam
                    pelanggaran kedisiplinan. Saya
                    berjanji tidak akan terlambat datang ke sekolah lagi. Apabila saya terlambat datang ke sekolah lagi saya
                    siap diberikan sanksi yang sesuai dengan peraturan sekolah.</p>
                <p>Demikian surat pernyataaan terlambat ini saya buat dengan penuh penyesalan.</p>
            </div>
        </div>

        <div class="date">
            <?php setlocale(LC_TIME, 'ID'); ?>
            <p>{{ strftime('%A, %e %B %Y', strtotime('today')) }}</p>
        </div>

        <div class="ttd">
            <table>
                <tr>
                    <td id="wa">Peserta Didik,</td>
                    <td id="wo">Orang Tua/Wali Peserta Didik,</td>
                </tr>
                <tr>
                    <td class="coba" id="wa">(UI)</td>
                    <td class="coba" id="wo">(...........................)</td>
                </tr>
            </table>
        </div>
        <div class="ttd2">
            <table>
                <tr>
                    <td>Pembimbing Siswa,</td>
                    <td>Kesiswaan,</td>
                </tr>
                <tr>
                    <td class="coba">(PS {{ $uniqueStudent->rayon->rayon }})</td>
                    <td class="coba">(...........................)</td>
                </tr>
            </table>
        </div>
    @endforeach
</body>


</html>
