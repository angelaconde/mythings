var chartC = document.getElementById("chart-completion");
var chartCompletion = new Chart(chartC, {
    type: 'pie',
    options: {
        legend: {
            position: 'left',
            labels: {
                boxWidth: 10,
                fontStyle: 'italic',
                fontColor: '#aaa',
                usePointStyle: true,
            }
        },
    },
    data: {
        labels: [
            "Finished",
            "Completed",
            "Abandoned",
        ],
        datasets: [{
            data: [stats.finished, stats.completed, stats.abandoned],
            borderWidth: 0,
            backgroundColor: [
                "#81b214",
                "#ffcc29",
                "#206a5d",
            ],
            hoverBackgroundColor: [
                "#60840f",
                "#dca700",
                "#14433b",
            ]
        }]
    }
});

var chartB = document.getElementById("chart-backlog");
var chartBacklog = new Chart(chartB, {
    type: 'pie',
    options: {
        legend: {
            position: 'left',
            labels: {
                boxWidth: 10,
                fontStyle: 'italic',
                fontColor: '#aaa',
                usePointStyle: true,
            }
        },
    },
    data: {
        labels: [
            "Started",
            "Not started",
        ],
        datasets: [{
            data: [stats.started, stats.owned-stats.started],
            borderWidth: 0,
            backgroundColor: [
                "#f58634",
                "#34a3f5",
            ],
            hoverBackgroundColor: [
                "#d25f0a",
                "#0c8cea",
            ]
        }]
    }
});
