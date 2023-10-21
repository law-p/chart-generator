<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart Generator</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }
        canvas {
            border: 1px solid #ccc;
            margin: 20px 0;
        }
        input {
            margin: 5px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-chart-pie"></i> Bar Chart Generator</h1>
        <form id="chartForm">
            <div id="dataInputs">
                <div class="dataInput">
                    <input type="text" name="label" placeholder="Label">
                    <input type="number" name="value" placeholder="Value">
                </div>
            </div>
            <button type="button" id="addMore"><i class="fas fa-plus"></i> Add More</button>
            <button type="button" id="generateChart"><i class="fas fa-chart-area"></i> Generate</button>
        </form>
        <div id="chartContainer">
            <canvas id="chartCanvas"></canvas>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dataInputs = document.getElementById('dataInputs');
            const addMoreButton = document.getElementById('addMore');
            const generateButton = document.getElementById('generateChart');
            const chartCanvas = document.getElementById('chartCanvas');
            const ctx = chartCanvas.getContext('2d');
            let chartData = [];
            let chart = null;

            function generateBarChart() {
                const labels = chartData.map(entry => entry.label);
                const values = chartData.map(entry => entry.value);

                if (chart) {
                    // Update the chart's dataset with new data
                    chart.data.labels = labels;
                    chart.data.datasets[0].data = values;
                    chart.update(); // Update the chart
                } else {
                    // If there's no existing chart, create a new one
                    chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'My First Dataset',
                                data: values,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 205, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(201, 203, 207, 0.2)'
                                ],
                                borderColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(255, 159, 64)',
                                    'rgb(255, 205, 86)',
                                    'rgb(75, 192, 192)',
                                    'rgb(54, 162, 235)',
                                    'rgb(153, 102, 255)',
                                    'rgb(201, 203, 207)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }
            }

            addMoreButton.addEventListener('click', function() {
                const dataInput = document.createElement('div');
                dataInput.classList.add('dataInput');
                dataInput.innerHTML = `
                    <input type="text" name="label" placeholder="Label">
                    <input type="number" name="value" placeholder="Value">
                `;
                dataInputs.appendChild(dataInput);
            });

            generateButton.addEventListener('click', function() {
                chartData = [];
                const dataInputs = document.querySelectorAll('.dataInput');
                dataInputs.forEach(input => {
                    const label = input.querySelector('[name="label"]').value;
                    const value = parseFloat(input.querySelector('[name="value"]').value);
                    if (label && !isNaN(value)) {
                        chartData.push({ label, value });
                    }
                });

                if (chartData.length > 0) {
                    generateBarChart();
                }
            });
        });
    </script>
</body>
</html>
