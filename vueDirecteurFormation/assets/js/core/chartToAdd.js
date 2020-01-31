//radar
var categorie;
var licence;
var licenceplus;
var mastera;


/*
    CHART BAR CATEGORIE
 */

$.ajax({
    url: '../../../includes/rest/rest_master_informatique.php', // your php file
    type: 'GET', // type of the HTTP request
    success: function (data) {
        var obj = jQuery.parseJSON(data);
        mastera = obj;
        console.log(licence);
        console.log(licenceplus);
        console.log(mastera);
        var ctxR = document.getElementById("Chart").getContext('2d');
        var myRadarChart = new Chart(ctxR, {
            type: 'radar',
            data: {
                labels: ["Développer un logiciel", "Modéliser et construire un système", "Administrer des systèmes et réseaux", "Appliquer les principes du génie logiciel", "Intégrer les contraintes réciproques entre le monde physique et le monde virtuel", "Communiquer au sujet de son entreprise, son organisation ou son projet..", "Adapter ses pratiques et ses compétences dans un domaine..", "Adopter une démarche responsable"],
                datasets: [{
                    label: "NON ACQUIS",
                    data: [35, 34, 12, 34, 12, 11, 23, 56],
                    backgroundColor: [
                        'rgba(105, 0, 132, .2)', 'rgba(105, 0, 132, .2)', 'rgba(105, 0, 132, .2)', 'rgba(105, 0, 132, .2)', 'rgba(105, 0, 132, .2)', 'rgba(105, 0, 132, .2)', 'rgba(105, 0, 132, .2)', 'rgba(105, 0, 132, .2)',
                    ],
                    borderColor: [
                        'rgba(200, 99, 132, .7)', 'rgba(200, 99, 132, .7)', 'rgba(200, 99, 132, .7)', 'rgba(200, 99, 132, .7)', 'rgba(200, 99, 132, .7)', 'rgba(200, 99, 132, .7)', 'rgba(200, 99, 132, .7)', 'rgba(200, 99, 132, .7)',
                    ],
                    borderWidth: 2
                },
                    {
                        label: "ACQUIS",
                        data: [45, 50, 60, 45, 70, 30, 34, 12],
                        backgroundColor: [
                            'rgba(0, 250, 220, .2)', 'rgba(0, 250, 220, .2)', 'rgba(0, 250, 220, .2)', 'rgba(0, 250, 220, .2)', 'rgba(0, 250, 220, .2)', 'rgba(0, 250, 220, .2)', 'rgba(0, 250, 220, .2)', 'rgba(0, 250, 220, .2)',
                        ],
                        borderColor: [
                            'rgba(0, 213, 132, .7)', 'rgba(0, 213, 132, .7)', 'rgba(0, 213, 132, .7)', 'rgba(0, 213, 132, .7)', 'rgba(0, 213, 132, .7)', 'rgba(0, 213, 132, .7)', 'rgba(0, 213, 132, .7)', 'rgba(0, 213, 132, .7)',
                        ],
                        borderWidth: 2
                    },
                    {
                        label: "EN COURS D'ACQUISITION",
                        data: [20, 16, 28, 21, 18, 59, 43, 32],
                        backgroundColor: [
                            'rgba(0, 0, 220, .2)', 'rgba(0, 0, 220, .2)', 'rgba(0, 0, 220, .2)', 'rgba(0, 0, 220, .2)', 'rgba(0, 0, 220, .2)', 'rgba(0, 0, 220, .2)', 'rgba(0, 0, 220, .2)', 'rgba(0, 0, 220, .2)',
                        ],
                        borderColor: [
                            'rgba(0, 0, 132, .7)', 'rgba(0, 0, 132, .7)', 'rgba(0, 0, 132, .7)', 'rgba(0, 0, 132, .7)', 'rgba(0, 0, 132, .7)', 'rgba(0, 0, 132, .7)', 'rgba(0, 0, 132, .7)', 'rgba(0, 0, 132, .7)',
                        ],
                        borderWidth: 2
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                scale: {
                    ticks: {
                        beginAtZero: true
                    }
                }

            }
        });
    }
});


//

$.ajax({
    url: '../../../includes/rest/rest_master_informatique.php', // your php file
    type: 'GET', // type of the HTTP request
    success: function (data) {
        var obj = jQuery.parseJSON(data);
        mastera = obj;
        console.log(licence);
        console.log(licenceplus);
        console.log(mastera);
        var ctxR2 = document.getElementById("Chart2").getContext('2d');
        var myRadarChart2 = new Chart(ctxR2, {
            type: 'radar',
            data: {
                labels: ["Développer un logiciel", "Modéliser et construire un système", "Administrer des systèmes et réseaux", "Appliquer les principes du génie logiciel", "Intégrer les contraintes réciproques entre le monde physique et le monde virtuel", "Communiquer au sujet de son entreprise, son organisation ou son projet..", "Adapter ses pratiques et ses compétences dans un domaine..", "Adopter une démarche responsable"],
                datasets: [{
                    label: "NON ACQUIS",
                    data: [33, 34, 51, 22, 14, 62, 12, 30],
                    backgroundColor: [
                        'rgba(105, 0, 132, .2)', 'rgba(105, 0, 132, .2)', 'rgba(105, 0, 132, .2)', 'rgba(105, 0, 132, .2)', 'rgba(105, 0, 132, .2)', 'rgba(105, 0, 132, .2)', 'rgba(105, 0, 132, .2)', 'rgba(105, 0, 132, .2)',
                    ],
                    borderColor: [
                        'rgba(200, 99, 132, .7)', 'rgba(200, 99, 132, .7)', 'rgba(200, 99, 132, .7)', 'rgba(200, 99, 132, .7)', 'rgba(200, 99, 132, .7)', 'rgba(200, 99, 132, .7)', 'rgba(200, 99, 132, .7)', 'rgba(200, 99, 132, .7)',
                    ],
                    borderWidth: 2
                },
                    {
                        label: "ACQUIS",
                        data: [63, 10, 30, 15, 68, 19, 62, 67],
                        backgroundColor: [
                            'rgba(0, 250, 220, .2)', 'rgba(0, 250, 220, .2)', 'rgba(0, 250, 220, .2)', 'rgba(0, 250, 220, .2)', 'rgba(0, 250, 220, .2)', 'rgba(0, 250, 220, .2)', 'rgba(0, 250, 220, .2)', 'rgba(0, 250, 220, .2)',
                        ],
                        borderColor: [
                            'rgba(0, 213, 132, .7)', 'rgba(0, 213, 132, .7)', 'rgba(0, 213, 132, .7)', 'rgba(0, 213, 132, .7)', 'rgba(0, 213, 132, .7)', 'rgba(0, 213, 132, .7)', 'rgba(0, 213, 132, .7)', 'rgba(0, 213, 132, .7)',
                        ],
                        borderWidth: 2
                    },
                    {
                        label: "EN COURS D'ACQUISITION",
                        data: [14, 56, 19, 63, 18, 19, 26, 3],
                        backgroundColor: [
                            'rgba(0, 0, 220, .2)', 'rgba(0, 0, 220, .2)', 'rgba(0, 0, 220, .2)', 'rgba(0, 0, 220, .2)', 'rgba(0, 0, 220, .2)', 'rgba(0, 0, 220, .2)', 'rgba(0, 0, 220, .2)', 'rgba(0, 0, 220, .2)',
                        ],
                        borderColor: [
                            'rgba(0, 0, 132, .7)', 'rgba(0, 0, 132, .7)', 'rgba(0, 0, 132, .7)', 'rgba(0, 0, 132, .7)', 'rgba(0, 0, 132, .7)', 'rgba(0, 0, 132, .7)', 'rgba(0, 0, 132, .7)', 'rgba(0, 0, 132, .7)',
                        ],
                        borderWidth: 2
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                scale: {
                    ticks: {
                        beginAtZero: true,
                        max: 80
                    }
                }

            }
        });
    }
});

var acquis = document.getElementById("acquis").innerText;
var encours = document.getElementById("encours").innerText;
var nonacquis = document.getElementById("nonacquis").innerText;

var ctxR = document.getElementById("bigDashboardChart").getContext('2d');
var myDoughnutChart = new Chart(ctxR, {
    type: 'doughnut',
    data: {
        labels: ["Non acquis",'Acquis','En cours'],
        datasets: [{
            label: "",
            data: [nonacquis, acquis, encours],
            backgroundColor: [
                'rgba(255,30,30, .8)', 'rgba(40,167,69, .8)', 'rgba(255,193,7, .8)',
            ],
            borderColor: [
                'rgba(220,53,69, .2)', 'rgba(45,172,74, .2)', 'rgba(255,193,7, .2)',
            ],
            borderWidth: 2
        },
        ]
    },
    options: {
        responsive: true,
        legend: {
            position: 'bottom',
            labels: {
            }
        }
    }
});