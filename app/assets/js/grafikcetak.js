const al1 = document.getElementById("al1").value;
const al2 = document.getElementById("al2").value;
const al3 = document.getElementById("al3").value;

const hasl1 = parseFloat(document.getElementById("hasl1").value);
const hasl2 = parseFloat(document.getElementById("hasl2").value);
const hasl3 = parseFloat(document.getElementById("hasl3").value);

var ct = document.getElementById('mChart').getContext('2d');

var mChart = new Chart(ct, {
    type: 'bar',
    data: {
        labels: [al3, al2,al1],
        datasets: [{
            label: 'Hasil V',
            data: [hasl3, hasl2, hasl1],
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

