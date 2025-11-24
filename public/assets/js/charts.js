/* CHARTS (Chart.js) */
const ctx = document.getElementById('statsChart').getContext('2d');

// sample dataset
const labels = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
const botsData = [13, 3, 9, 14, 17, 18, 18];
const membersData = [112, 114, 116, 113, 117, 119, 109];
const staffData = [2, 2, 2, 2, 2, 3, 3];

const statsChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels,
    datasets: [
      {
        type: 'line',
        label: 'Members',
        data: membersData,
        borderWidth: 2,
        tension: 0.3,
        yAxisID: 'y'
      },
      {
        type: 'bar',
        label: 'Bots',
        data: botsData,
        borderRadius: 6,
        barThickness: 18,
        yAxisID: 'y'
      },
      {
        type: 'bar',
        label: 'Staff',
        data: staffData,
        borderRadius: 6,
        barThickness: 14,
        yAxisID: 'y'
      }
    ]
  },
  options: {
    responsive: true,
    interaction: { mode: 'index', intersect: false },
    stacked: false,
    plugins: {
      legend: { position: 'top' },
      tooltip: { mode: 'index', intersect: false }
    },
    scales: {
      y: {
        beginAtZero: true,
        title: { display: true, text: 'Count' }
      }
    }
  }
});
