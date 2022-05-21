<!-- Clear Old Chart Data -->
document.getElementById("chartContainerPie").innerHTML = '&nbsp;';
document.getElementById("chartContainerPie").innerHTML = '<canvas id="myPieChart"></canvas>';

<!-- Get Id For Where Chart To Render -->
const ctxPie = document.getElementById("myPieChart");
let years = [];
let yearlySales = [];

<!-- For Data Entry -->
for (let i=0; i<yearlyTotalSales.length; ++i){
    years.push(yearlyTotalSales[i]['year']);
    yearlySales.push(yearlyTotalSales[i]['total']);
}

<!-- Filter Undefined Value -->
years = years.filter(element => {
    return element !== null;
});
yearlySales = yearlySales.filter(element => {
    return element !== null;
});

<!-- Chart Config -->
new Chart(ctxPie, {
    type: 'doughnut',
    data: {
        labels: years,//Data For Labels
        datasets: [{
            data: yearlySales,//Data For Chart
            backgroundColor: [
                "#54bebebb",
                "#76c8c8bb",
                "#98d1d1bb",
                "#badbdbbb",
                "#dedad2bb",
                "#e4bcadbb",
                "#df979ebb",
                "#d7658bbb",
                "#c80064bb"],
            hoverBackgroundColor: [
                "#54bebe",
                "#76c8c8",
                "#98d1d1",
                "#badbdb",
                "#dedad2",
                "#e4bcad",
                "#df979e",
                "#d7658b",
                "#c80064"],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
    },
    options: {
        maintainAspectRatio: false,
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
        },
        legend: {
            display: true
        },
        cutoutPercentage: 80,
    },
});
