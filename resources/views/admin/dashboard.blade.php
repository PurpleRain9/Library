@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="count">
            <div class="all">
                <h1 class="text-center">All Count Pie</h1>
                <div id="all" style="width: 600px;height:400px;"></div>
            </div>
            <div class="userOnly">
                <h1 class="text-center">Users Graph</h1>
                <div id="userOnly" style="width: 600px;height:400px;"></div>
            </div>
        </div>
    </div>
@endsection
@section('echart_js')
    <script>
        var myChart = echarts.init(document.getElementById('all'));
        all = {
            title: {
                text: 'Referer of a Website',
                // subtext: 'Fake Data',
                left: 'center'
            },
            tooltip: {
                trigger: 'item'
            },
            legend: {
                orient: 'vertical',
                left: 'left'
            },
            series: [{
                name: 'Access From',
                type: 'pie',
                radius: '50%',
                data: [{
                        value: {{$total_user}},
                        name: 'Users'
                    },
                    {
                        value: {{$total_product}},
                        name: 'Products'
                    },
                    {
                        value: {{$total_blog}},
                        name: 'Blogs'
                    },
                    {
                        value: {{$total_library}},
                        name: 'Library Books'
                    },
                    {
                        value: {{$total_contact}},
                        name: 'Contacted'
                    }
                ],
                emphasis: {
                    itemStyle: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }]
        };
        myChart.setOption(all);
        var myUser = echarts.init(document.getElementById('userOnly'))
        user = {
            tooltip: {
                trigger: 'item'
            },
            xAxis: {
                text:'Months',
                type: 'category',
                data: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December']
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                test:'Number Of Users',
                data:{{ $userData }},
                type: 'bar'
            }]
        };
        myUser.setOption(user);
    </script>
@endsection

{{-- ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'Decem'] --}}
