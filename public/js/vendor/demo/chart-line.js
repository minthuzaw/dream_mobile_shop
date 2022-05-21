<!-- Get Year From User And Show Chart -->
function getSelectedYearLine() {
    const months = [];
    const monthlySales = [];

    <!-- Get Year And Turn Into Integer -->
    const year = document.getElementById("year");
    let selectedYear = parseInt(year.options[year.selectedIndex].text);

    <!-- Show Chart -->
    ShowChartLine(months,monthlySales,selectedYear);
}

function ShowChartLine(months,monthlySales,selectedYear){

    <!-- Clear Old Chart Data -->
    document.getElementById("chartContainerLine").innerHTML = '&nbsp;';
    document.getElementById("chartContainerLine").innerHTML = '<canvas id="myLineChart"></canvas>';

    <!-- Get Id For Where Chart To Render -->
    const ctxLine = document.getElementById("myLineChart");

    <!-- Get Data From Blade -->
    const sales = monthlyTotalSales;

    <!-- For Data Entry -->
    for (let i=0; i<sales.length; ++i){
        if (sales[i]['year'] === selectedYear){
            months.push(sales[i]['sold_at']);
            monthlySales.push(sales[i]['total'])
        }
    }

    <!-- Filter Undefined Value -->
    months = months.filter(element => {
        return element !== null;
    });
    monthlySales = monthlySales.filter(element => {
        return element !== null;
    });

    <!-- Chart Config -->
    new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: months,//Data For Labels
            datasets: [{
                label: "Earnings of year : " + selectedYear,
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: monthlySales,//Data For Chart
            }],
        },
    });
}
