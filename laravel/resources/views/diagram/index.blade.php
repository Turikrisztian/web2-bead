<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Diagram</h2></x-slot>
    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded p-6">
                <canvas id="chart" class="w-full" style="max-height:320px"></canvas>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script>
        const ctx = document.getElementById('chart');
        const data = { labels: @json($stats['labels']), datasets: [{ label:'Mintastatisztika', data:@json($stats['values']), backgroundColor:['#ff6b3a','#3498db','#2ecc71','#9b59b6','#e74c3c'] }] };
        new Chart(ctx,{type:'bar',data});
    </script>
</x-app-layout>
