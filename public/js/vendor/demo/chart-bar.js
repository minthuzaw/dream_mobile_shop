<!-- Get Year From User And Show Chart -->
function getSelectedYearBar() {
    const phonesName = [];
    const quantity = [];

    <!-- Get Year And Turn Into Integer -->
    const year = document.getElementById("year-bar");
    let selectedYear = parseInt(year.options[year.selectedIndex].text);

    <!-- Show Chart -->
    ShowChartBar(phonesName,quantity,selectedYear);
}

function ShowChartBar(phonesName,quantity,selectedYear) {

    <!-- Clear Old Chart Data -->
    document.getElementById("chartContainerBar").innerHTML = '&nbsp;';
    document.getElementById("chartContainerBar").innerHTML = '<canvas id="myBarChart"></canvas>';

    <!-- Get Id For Where Chart To Render -->
    const ctxBar = document.getElementById("myBarChart");

    <!-- Get Data From Blade -->
    const phones = totalPhoneSold;

    <!-- For Data Entry -->
    for (let i = 0; i < phones.length; ++i) {
        if (phones[i]['year'] === selectedYear) {
            phonesName.push(phones[i]['phone_name']);
            quantity.push(phones[i]['quantity']);
        }
    }

    <!-- Filter Undefined Value -->
    phonesName = phonesName.filter(element => {
        return element !== null;
    });
    quantity = quantity.filter(element => {
        return element !== null;
    });


    <!-- Sort Phone By Quantity Sold -->
    let arrayOfObj = phonesName.map(function (d, i) {
        return {
            label: d,
            data: quantity[i] || 0
        };
    });

    let sortedArrayOfObj = arrayOfObj.sort(function (a, b) {
        return b.data - a.data;
    });

    let sortedPhonesName = [];
    let sortedQuantity = [];
    sortedArrayOfObj.forEach(function(d){
        sortedPhonesName.push(d.label);
        sortedQuantity.push(d.data);
    });

    <!-- Chart Config -->
    new Chart(ctxBar, {
        type: 'horizontalBar',
        data: {
            labels: sortedPhonesName.slice(0,9),//Max Ten Data For Labels
            datasets: [{
                label: 'Top 10 Best-Selling Mobile Phones of : ' + selectedYear,
                data: sortedQuantity.slice(0,9),//Max Ten Data For Chart
                backgroundColor: [

                    "#54bebe",
                    "#76c8c8",
                    "#98d1d1",
                    "#badbdb",
                    "#dedad2",
                    "#e4bcad",
                    "#df979e",
                    "#d7658b",
                    "#c80064"

                ],
                borderColor: [

                    'rgb(75, 192, 192)',

                ],
                borderWidth: 0.5
            }],
        },
        options: {
            legend: {
                label: {
                    Color: "blue",
                }
            },
        }
    });
}
