/*let charts = document.querySelectorAll("#myChart");
let proceso = document.querySelectorAll("[id=proceso]");
let concluida = document.querySelectorAll("[id=concluida]");

let allData = {
    dataProcess: [],
    dataDone: [],
};

proceso.forEach((process) => {
    data = process.innerHTML;
    allData.dataProcess.push(data);
});

concluida.forEach((finish) => {
    data = finish.innerHTML;
    allData.dataDone.push(data);
});

console.log(allData);

charts.forEach((ctx) => {
    new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: ["Sin Hacer", "Hechas"],
            datasets: [
                {
                    label: "# ",
                    data: [allData.dataProcess, allData.dataDone],
                    borderWidth: 1,
                },
            ],
        },
    });
});
*/
