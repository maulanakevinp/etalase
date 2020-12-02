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

    #container h4 {
        text-transform: none;
        font-size: 14px;
        font-weight: normal;
    }

    #container p {
        font-size: 13px;
        line-height: 16px;
    }

    @media screen and (max-width: 600px) {
        #container h4 {
            font-size: 2.3vw;
            line-height: 3vw;
        }

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
    <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-4 heading-section ftco-animate">
            <span class="subheading">Struktur Organisasi</span>
            <h2 class="mb-4">PENGURUS UKMK ETALASE</h2>
            <p>Berikut adalah susunan kepengurusan UKMK Etalase periode 2019 - 2020 </p>
        </div>
    </div>
    <figure class="highcharts-figure">
        <div id="container"></div>
        <p class="highcharts-description">
            Organization charts are a common case of hierarchical network charts,
            where the parent/child relationships between nodes are visualized.
            Highcharts includes a dedicated organization chart type that streamlines
            the process of creating these types of visualizations.
        </p>
    </figure>
    <div class="row ftco-animate">
        <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
                @foreach ($structures as $structure)

                <div class="item">
                    <div class="testimony-wrap p-4 pb-5">
                        <div class="user-img mb-4"
                            style="background-image:url({{ $structure->image == "noimage.jpg" ? asset('noimage.jpg') : asset('img/anggota/'.$structure->image) }})">
                            <span class="quote d-flex align-items-center justify-content-center">
                                <i class="icon-quote-left"></i>
                            </span>
                        </div>
                        <div class="text">
                            <p class="mb-5 pl-4 line">{{$structure->jabatan}}</p>
                            <div class="pl-5">
                                <p class="name">{{$structure->nama}}</p>
                                <span class="position">{{$structure->NIA}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    Highcharts.chart('container', {
        chart: {
            height: 600,
            inverted: true,
            backgroundColor: 'transparent'
        },

        title: {
            text: 'Pengurus'
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
                ['Ketua Umum', 'Litbang1'],
                ['Ketua Umum', 'Litbang2'],
                ['Ketua Umum', 'Perlengkapan1'],
                ['Ketua Umum', 'Perlengkapan2'],
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
                title: 'UKMKE.4.2017.9',
                name: 'Cyril Adib Furqoni',
                image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2018/11/12132317/Grethe.jpg',
            }, {
                id: 'Bendahara Umum',
                title: 'UKMKE.4.2017.9',
                name: 'Nilam Wahidah',
                image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2018/11/12132317/Grethe.jpg',
            }, {
                id: 'Sekretaris Umum',
                title: 'UKMKE.4.2017.9',
                name: 'Niki Pradana',
                image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2018/11/12132317/Grethe.jpg',
            }, {
                id: 'Litbang1',
                title: 'UKMKE.4.2017.9',
                name: 'Imas Andri Fajri',
                image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2018/11/12132317/Grethe.jpg',
                column: 2,
            }, {
                id: 'Litbang2',
                title: 'UKMKE.4.2017.9',
                name: 'Venny Kurniawati',
                image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2018/11/12132317/Grethe.jpg',
                column: 2,
            }, {
                id: 'Perlengkapan1',
                title: 'Sakti Hendriawan',
                name: 'UKMKE.4.2017.9',
                column: 2,
                image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2018/11/12132313/Anita.jpg',
                layout: 'hanging'
            }, {
                id: 'Perlengkapan2',
                title: 'Linda Oktaviani',
                name: 'UKMKE.4.2017.9',
                column: 2,
                image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2018/11/13105551/Vidar.jpg',
                layout: 'hanging'
            }, {
                id: 'Keanggotaan',
                title: 'Wanda',
                name: 'UKMKE.4.2017.9',
                column: 2,
                image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2018/11/13105551/Vidar.jpg',
                layout: 'hanging'
            }, {
                id: 'Humas1',
                title: 'Irsyadul Anam',
                name: 'UKMKE.4.2017.9',
                column: 2,
                image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2018/11/13105551/Vidar.jpg',
                layout: 'hanging'
            }, {
                id: 'Humas2',
                title: 'Fogi Erlingga',
                name: 'UKMKE.4.2017.9',
                column: 2,
                image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2018/11/13105551/Vidar.jpg',
                layout: 'hanging'
            }, {
                id: 'Korbid1',
                title: 'Achmad Zein Feroza',
                name: 'UKMKE.4.2017.9',
                column: 3,
                image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2018/11/13105551/Vidar.jpg',
                layout: 'hanging'
            }, {
                id: 'Korbid2',
                title: 'Bayu Hibatullah',
                name: 'UKMKE.4.2017.9',
                column: 3,
                image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2018/11/13105551/Vidar.jpg',
                layout: 'hanging'
            }, {
                id: 'Korbid3',
                title: 'Maharani Sesa Adi Sasanti',
                name: 'UKMKE.4.2017.9',
                column: 3,
                image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2018/11/13105551/Vidar.jpg',
                layout: 'hanging'
            }, {
                id: 'Korbid4',
                title: 'Yohana Utari',
                name: 'UKMKE.4.2017.9',
                column: 3,
                image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2018/11/13105551/Vidar.jpg',
                layout: 'hanging'
            }, {
                id: 'Korbid5',
                title: 'Afifatul Aliyah',
                name: 'UKMKE.4.2017.9',
                column: 3,
                image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2018/11/13105551/Vidar.jpg',
                layout: 'hanging'
            },
            {
                id: 'Product',
                name: 'Product developers'
            }, {
                id: 'Web',
                name: 'Web devs, sys admin'
            }, {
                id: 'Sales',
                name: 'Sales team'
            }, {
                id: 'Market',
                name: 'Marketing team'
            }],
            colorByPoint: false,
            color: '#007ad0',
            dataLabels: {
                color: 'white'
            },
            borderColor: 'white',
            nodeWidth: 100,
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
