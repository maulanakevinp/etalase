@extends('layouts.master')
@section('content')
<style>
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 600px;
        max-width: 800px;
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #EBEBEB;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }

    .highcharts-credits {
            display: none;
        }

    #container h4 {
        text-transform: none;
        font-size: 14px;
        font-weight: normal;
    }

    #container p {
        font-size: 13px;
        line-height: 16px;
    }

    #container {
        width: 100%;
    }

    #pengurus {
        display: none;
    }

    @media screen and (max-width: 600px) {
        #container h4 {
            font-size: 2.3vw;
            line-height: 3vw;
        }

        .highcharts-figure {
            transform: scale(.50);
            transform-origin: top;
            text-align: center;
            float: left;
            padding: 0;
        }

        .highcharts-button .highcharts-contextbutton .highcharts-button-normal {
            transform: none;
            display: block;
            position: absolute;
        }

        .highcharts-credits {
            display: none;
        }

        #container {
            padding: 0;
            text-align: left;

        }

        /* #pengurus{
            display: block;
        } */
        #container p {
            font-size: 2.3vw;
            line-height: 3vw;
        }
    }
</style>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/sankey.js"></script>
<script src="https://code.highcharts.com/modules/organization.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<div class="container pt-5 text-center">
    <div class="row justify-content-center">
        <div class="col-md-4 heading-section ftco-animate">
            <span class="subheading">Struktur Organisasi</span>
            <h2 class="mb-4">PENGURUS UKMK ETALASE</h2>
            <p>Berikut adalah susunan kepengurusan UKMK Etalase periode 2019 - 2020 </p>
        </div>
    </div>
    <div class="row justify-content-center text-center">
    <figure class="highcharts-figure col-md-6 text-center mb-5">
        <div id="container" class="col-md-12 text-center ml-0"></div>
    </figure>
    </div>
</div>
<script>
    Highcharts.chart('container', {
        chart: {
            height: 1000,
            inverted: true,
            backgroundColor: 'transparent'
        },

        title: {
            text: 'Pengurus',
            color: '#980104'
        },

        accessibility: {
            point: {
                descriptionFormatter: function (point) {
                    var nodeName = point.toNode.name,
                        nodeId = point.toNode.id,
                        nodeDesc = nodeName === nodeId ? nodeName : nodeName + ', ' + nodeId,
                        parentDesc = point.fromNode.id;
                    return point.index + '. ' + nodeDesc + ', reports to ' + parentDesc + '.';
                }
            }
        },

        series: [{
            type: 'organization',
            name: 'Pengurus',

            keys: ['from', 'to'],
            data: [
                ['Ketua Umum', 'Bendahara Umum'],
                ['Ketua Umum', 'Sekretaris Umum'],
                ['Ketua Umum', 'Perlengkapan1'],
                ['Ketua Umum', 'Perlengkapan2'],
                ['Ketua Umum', 'Litbang2'],
                ['Ketua Umum', 'Litbang1'],
                ['Ketua Umum', 'Keanggotaan'],
                ['Ketua Umum', 'Humas1'],
                ['Ketua Umum', 'Humas2'],
                ['Ketua Umum', 'Korbid1'],
                ['Ketua Umum', 'Korbid2'],
                ['Ketua Umum', 'Korbid3'],
                ['Ketua Umum', 'Korbid4'],
                ['Ketua Umum', 'Korbid5'],
            ],
            levels: [{
                level: 0,
                color: '#980104',
                height: 25
            }, {
                level: 1,
                color: '#980104',
                height: 25
            }, {
                level: 2,
                color: '#980104'
            }, {
                level: 4,
                color: '#359154'
            }],
            nodes: [{
                id: 'Ketua Umum',
                title: 'Cyril Adib Furqoni',
                name: 'Ketua Umum',
                image: `{{asset('img/Cyril.jpg')}}`,
            }, {
                id: 'Bendahara Umum',
                title: 'Nilam Wahidah',
                name: 'Bendahara Umum',
                image: `{{asset('img/Nilam.jpg')}}`,
            }, {
                id: 'Sekretaris Umum',
                title: 'Niki Putri Hadi Pradani',
                name: 'Sekretaris Umum',
                image: `{{asset('img/Niki.jpg')}}`,
            }, {
                id: 'Litbang1',
                title: 'Imas Andrian Fajri',
                name: 'Litbang',
                image: `{{asset('img/Imas.jpg')}}`,
                column: 2,
            }, {
                id: 'Litbang2',
                title: 'Veny Kurniawati',
                name: 'Litbang',
                image: `{{asset('img/veny.jpeg')}}`,
                column: 2,
            }, {
                id: 'Perlengkapan1',
                title: 'Hendry Sakti Irawan',
                name: 'Perlengkapan',
                column: 2,
                image: `{{asset('img/Sakti.jpg')}}`,
                layout: 'hanging'
            }, {
                id: 'Perlengkapan2',
                title: 'Linda Oktaviani',
                name: 'Perlegkapan',
                column: 2,
                image: `{{asset('img/Linda.jpg')}}`,
                layout: 'hanging'
            }, {
                id: 'Keanggotaan',
                title: 'Wanda Putri Mariani',
                name: 'Keanggotaan',
                column: 2,
                image: `{{asset('img/wanda.jpeg')}}`,
                layout: 'hanging'
            }, {
                id: 'Humas1',
                title: 'Irsyadul Anam Hasani',
                name: 'Humas',
                column: 2,
                image: `{{asset('img/hasan.jpeg')}}`,
                layout: 'hanging'
            }, {
                id: 'Humas2',
                title: 'Fogi Erlingga',
                name: 'Humas',
                column: 2,
                image: `{{asset('img/lingga.jpeg')}}`,
                layout: 'hanging'
            }, {
                id: 'Korbid1',
                title: 'Achmad Zein Feroza',
                name: 'Korbid Musik',
                column: 3,
                image: `{{asset('img/Osa.jpg')}}`,
                layout: 'hanging'
            }, {
                id: 'Korbid2',
                title: 'Alfian Bayu Hibatullah',
                name: 'Korbid Fotografi',
                column: 3,
                image: `{{asset('img/Bayu.jpg')}}`,
                layout: 'hanging'
            }, {
                id: 'Korbid3',
                title: 'Maharani Edi Shashanti',
                name: 'Korbid Tari',
                column: 3,
                image: `{{asset('img/Sesa.jpg')}}`,
                layout: 'hanging'
            }, {
                id: 'Korbid4',
                title: 'Yohana Yuni U',
                name: 'Korbid PSM',
                column: 3,
                image: `{{asset('img/Yohana.jpg')}}`,
                layout: 'hanging'
            }, {
                id: 'Korbid5',
                title: 'Afifatul Aliyah',
                name: 'Korbid Teater',
                column: 3,
                image: `{{asset('img/Afif.jpg')}}`,
                layout: 'hanging'
            }],
            colorByPoint: false,
            color: '#007ad0',
            dataLabels: {
                color: 'white'
            },
            borderColor: 'white',
            nodeWidth: 130,
            nodeHeight: 100,
            getExtremesFromAll: true
        }],
        tooltip: {
            outside: true
        },
        exporting: {
            allowHTML: true,
            sourceWidth: 1000,
            sourceHeight: 600
        }

    });
</script>

@endsection