<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       {{  __($teacher->class_name)  }} Class Performance (Chart View)
    </h2>
  </x-slot>

  <x-auth-validation-errors class="w-1/2 p-5 m-auto" :errors="$errors" />
  @if(Session::has('success'))
  <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-8 py-3" role="alert">
    {{Session::get('success')}}
  </div>
  @endif
  @if(Session::has('fail'))
  <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-8 py-3" role="alert">
    {{Session::get('fail')}}
  </div>
  @endif



  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-1 bg-white border-b border-gray-200">
          <div class="row justify-content-center">
            <a href="{{ route('classperformance') }}" class="p-5 underline text-blue-600 hover:text-blue-900 flex"> List View</a>

            <div id="piechart" style="width: 900px; height: 500px;"></div>
           </div>
           <div class="row justify-content-center">
             <div id="piechart2" style="width: 900px; height: 500px;"></div>
            </div>
         </div>
       </div>
     </div>
   </div>
</x-app-layout>

<!--
This javascript is based upon the code found here -> https://bit.ly/3BycMwB
& was adapted/changed for my system's data
-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Working Level', 'Number of pupils'],
          <?php echo $datas ?>
        ]);

        var options = {
          title: ' Class Working Level Summary',
          fontName: 'Roboto'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }

      function drawChart2() {

        var data = google.visualization.arrayToDataTable([
          ['Working Level', 'Number of pupils'],
           <?php echo $data2 ?>
        ]);

        var options = {
          title: ' Class Phonics Level Summary',
          pieHole:0.4,
          fontName: 'Roboto'

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>
