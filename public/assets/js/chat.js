/* CHAT PANEL CONTROLLER */
const chatContent = document.getElementById('chatContent');
const tabs = document.querySelectorAll('.chat-tabs .tab');

// sample data (você pode substituir por fetch/ajax)
const chatData = {
  bots: `
    <ul>
      <li><strong>GuardBot</strong> — Moderation • Online</li>
      <li><strong>MusicNode</strong> — Music • Idle</li>
      <li><strong>AutoLogs</strong> — Monitoring • Online</li>
      <li><strong>WelcomePlus</strong> — Greetings • Online</li>
    </ul>
  `,
  staff: `
    <ul>
      <li>Sammyinkr — Owner</li>
      <li>Noah — Exective</li>
      <li>Aj — Helper</li>
    </ul>
  `
};

// inicializa com bots
if (chatContent) chatContent.innerHTML = chatData.bots;

// troca de abas
tabs.forEach(tab => {
  tab.addEventListener('click', () => {
    tabs.forEach(t => t.classList.remove('active'));
    tab.classList.add('active');
    const type = tab.getAttribute('data-tab');
    chatContent.innerHTML = chatData[type] || '<p>No data</p>';
  });
});
