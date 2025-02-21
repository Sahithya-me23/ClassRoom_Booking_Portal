document.addEventListener("DOMContentLoaded", function () {
    const feedbackButton = document.getElementById("feedbackButton");
    const feedbackForm = document.getElementById("feedbackForm");
    const feedbackChartElement = document.getElementById("feedbackChart");
    const feedbackFormElement = document.getElementById("feedback-form");

    let feedbackData = JSON.parse(localStorage.getItem('feedbackData')) || {
        ui: [],
        ux: [],
        functionalities: [],
        easyBooking: [],
        performance: [],
        support: []
    };

    function updateChart() {
        const labels = ["User Interface", "User Experience", "Functionalities", "Easy Booking", "Performance", "Support"];
        const averageFeedback = {
            ui: average(feedbackData.ui),
            ux: average(feedbackData.ux),
            functionalities: average(feedbackData.functionalities),
            easyBooking: average(feedbackData.easyBooking),
            performance: average(feedbackData.performance),
            support: average(feedbackData.support)
        };

        const data = {
            labels: labels,
            datasets: [{
                label: 'Feedback',
                data: [
                    averageFeedback.ui,
                    averageFeedback.ux,
                    averageFeedback.functionalities,
                    averageFeedback.easyBooking,
                    averageFeedback.performance,
                    averageFeedback.support
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(255, 159, 64, 0.7)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        };

        new Chart(feedbackChartElement, {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 5
                    }
                }
            }
        });
    }

    function average(array) {
        const sum = array.reduce((a, b) => a + b, 0);
        return (array.length > 0) ? (sum / array.length) : 0;
    }

    feedbackButton.addEventListener("click", function () {
        feedbackForm.classList.toggle("hidden");
    });

    feedbackFormElement.addEventListener("submit", function (event) {
        event.preventDefault();

        const ui = parseInt(document.getElementById("ui").value);
        const ux = parseInt(document.getElementById("ux").value);
        const functionalities = parseInt(document.getElementById("functionalities").value);
        const easyBooking = parseInt(document.getElementById("easyBooking").value);
        const performance = parseInt(document.getElementById("performance").value);
        const support = parseInt(document.getElementById("support").value);

        feedbackData.ui.push(ui);
        feedbackData.ux.push(ux);
        feedbackData.functionalities.push(functionalities);
        feedbackData.easyBooking.push(easyBooking);
        feedbackData.performance.push(performance);
        feedbackData.support.push(support);

        localStorage.setItem('feedbackData', JSON.stringify(feedbackData));

        updateChart();

        feedbackForm.classList.add("hidden");
        feedbackFormElement.reset();
    });

    updateChart();
});
