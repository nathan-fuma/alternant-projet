//radar
var categorie;
var licence;
var licenceplus;
var mastera;

$.ajax({
    url: 'rest/rest_categorie.php', // your php file
    type: 'GET', // type of the HTTP request
    success: function (data) {
        var obj = jQuery.parseJSON(data);
        categorie = obj;
    }
});

$.ajax({
    url: 'rest/rest_licence1_informatique.php', // your php file
    type: 'GET', // type of the HTTP request
    success: function (data) {
        var obj = jQuery.parseJSON(data);
        licence = obj;
    }
});

$.ajax({
    url: 'rest/rest_licence3_informatique.php', // your php file
    type: 'GET', // type of the HTTP request
    success: function (data) {
        var obj = jQuery.parseJSON(data);
        licenceplus = obj;
    }
});

$.ajax({
    url: 'rest/rest_master_informatique.php', // your php file
    type: 'GET', // type of the HTTP request
    success: function (data) {
        var obj = jQuery.parseJSON(data);
        mastera = obj;
    console.log(licence);
        console.log(licenceplus);
        console.log(mastera);
        var ctxR = document.getElementById("radarChart").getContext('2d');
        var myRadarChart = new Chart(ctxR, {
            type: 'radar',
            data: {
                labels: categorie,
                datasets: [{
                    label: "Licence 1/2",
                    data: licence  ,
                    backgroundColor: [
                        'rgba(105, 0, 132, .2)',
                    ],
                    borderColor: [
                        'rgba(200, 99, 132, .7)',
                    ],
                    borderWidth: 2
                },
                    {
                        label: "Licence 3",
                        data: licenceplus,
                        backgroundColor: [
                            'rgba(0, 250, 220, .2)',
                        ],
                        borderColor: [
                            'rgba(0, 213, 132, .7)',
                        ],
                        borderWidth: 2
                    },
                    {
                        label: "Master",
                        data: mastera,
                        backgroundColor: [
                            'rgba(0, 0, 220, .2)',
                        ],
                        borderColor: [
                            'rgba(0, 0, 132, .7)',
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


/*var ctxR = document.getElementById("radarChart").getContext('2d');
var myRadarChart = new Chart(ctxR, {
    type: 'radar',
    data: {
        labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
        datasets: [{
            label: "My First dataset",
            data: [65, 59, 90, 81, 56, 55, 40],
            backgroundColor: [
                'rgba(105, 0, 132, .2)',
            ],
            borderColor: [
                'rgba(200, 99, 132, .7)',
            ],
            borderWidth: 2
        },
            {
                label: "My Second dataset",
                data: [28, 48, 40, 19, 96, 27, 100],
                backgroundColor: [
                    'rgba(0, 250, 220, .2)',
                ],
                borderColor: [
                    'rgba(0, 213, 132, .7)',
                ],
                borderWidth: 2
            }
        ]
    },
    options: {
        responsive: true
    }
});*/



