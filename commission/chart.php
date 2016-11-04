 <!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>ECharts</title>
       
    </head>
    <body>
    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="height:400px"></div>
    <script src="http://s1.bdstatic.com/r/www/cache/ecom/esl/1-6-10/esl.js"></script>
    <script type="text/javascript">
  // 路径配置
    require.config({
    paths:{ 
      'echarts': 'http://echarts.baidu.com/build/echarts',
      'echarts/chart/pie': 'http://echarts.baidu.com/build/echarts'
    }
  });

    require(
[
  'echarts',
  'echarts/chart/pie' // 使用柱状图就加载bar模块，按需加载
],
function (ec) {
  // 基于准备好的dom，初始化echarts图表
  var myChart = ec.init(document.getElementById('main')); 
  
  var option = {
      title : {
        text: 'ECharts实例',
        subtext: '饼图（Pie Chart）',
        x:'center'
      },
      tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
      },
      legend: {
        orient : 'vertical',
        x : 'left',
        data:['part1','part2','part3','part4']
      },
      toolbox: {
        show : true,
        feature : {
          //mark : {show: true},
          //dataView : {show: true, readOnly: false},
          restore : {show: true},
          //saveAsImage : {show: true}
        }
      },
      calculable : false,
      series : [
        {
          name:'饼图实例',
          type:'pie',
          radius : '55%',
          center: ['50%', '60%'],
          data:[
                {value:100, name:'part1'},
                {value:200, name:'part2'},
                {value:300, name:'part3'},
                {value:400, name:'part4'}]
        }
      ]
    };
  
  // 为echarts对象加载数据 
  myChart.setOption(option); 
}

    </script>

 
    </body>
</html>