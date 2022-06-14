const alt1 = document.getElementById("alt1").value;
const alt2 = document.getElementById("alt2").value;
const alt3 = document.getElementById("alt3").value;

const hasil1 = parseFloat(document.getElementById("hasil1").value);
const hasil2 = parseFloat(document.getElementById("hasil2").value);
const hasil3 = parseFloat(document.getElementById("hasil3").value);

var ctx = document.getElementById('myChart').getContext('2d');

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [alt3, alt2,alt1],
        datasets: [{
            label: 'Hasil V',
            data: [hasil3, hasil2, hasil1],
            backgroundColor: [
                '#E6212A',
                '#E8BA05',
                '#195792'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)', 
                'rgba(255, 206, 86, 1)',
                'rgba(54, 162, 235, 1)'
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

