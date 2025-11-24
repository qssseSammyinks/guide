<?php
// guides.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Staff Guides</title>

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="/public/assets/css/guides.css" />
</head>
<body>

    <div class="top-bar">
        <button class="theme-toggle" id="themeToggle"><i class="fa-solid fa-moon"></i></button>
        <a href="../dashboard/dashboard.html" class="back-btn"><i class="fa-solid fa-arrow-left"></i> Back to Dashboard</a>
    </div>

    <div class="container">
        <h1>Discord Staff Guides</h1>
        <p>Welcome to the official staff documentation for our Discord server. This guide includes rules, procedures, communication standards, and moderation information required for all staff members.</p>

        <!-- SECTION 1 -->
        <section class="guide-box">
            <h2>General Staff Rules</h2>
            <ul>
                <li>Always act respectfully and remain professional at all times.</li>
                <li>Do not abuse your permissions or act above others.</li>
                <li>Keep staff-only information private and confidential.</li>
                <li>Follow Discord’s Terms of Service and the server’s rules.</li>
                <li>Report any suspicious behavior or staff misconduct immediately.</li>
            </ul>
        </section>

        <!-- SECTION 2 -->
        <section class="guide-box">
            <h2>Moderation Workflow</h2>
            <ol>
                <li><strong>Soft Warning:</strong> Inform the user about what they did wrong politely.</li>
                <li><strong>Official Warning:</strong> Give a clear, logged warning if they continue.</li>
                <li><strong>Timeout/Mute:</strong> Apply if the user ignores both warnings.</li>
                <li><strong>Escalation:</strong> Contact higher staff for serious actions (kicks/bans).</li>
                <li><strong>Documentation:</strong> Always log your actions in the mod-logs channel.</li>
            </ol>
        </section>

        <!-- SECTION 3 -->
        <section class="guide-box">
            <h2>Staff Behavior Standards</h2>
            <p>Staff members represent the server at all times. Your behavior should reflect maturity, clarity, and responsibility. Avoid unnecessary arguments, jokes in serious channels, or anything that might escalate a conflict.</p>
            <ul>
                <li>Handle situations calmly and without bias.</li>
                <li>Avoid using sarcasm when moderating.</li>
                <li>Respect the hierarchy and follow instructions from higher staff.</li>
                <li>Be helpful and answer questions when available.</li>
            </ul>
        </section>

        <!-- SECTION 4 -->
        <section class="guide-box">
            <h2>Common Moderation Situations</h2>
            <ul>
                <li><strong>Spam:</strong> Warn once → timeout if repeated.</li>
                <li><strong>Harassment:</strong> Collect proof and escalate depending on severity.</li>
                <li><strong>NSFW Content:</strong> Remove immediately and issue a strong warning.</li>
                <li><strong>Raids/Bot Attacks:</strong> Lock channels and ping admins immediately.</li>
                <li><strong>Excessive Toxicity:</strong> Warn → mute → escalate if needed.</li>
            </ul>
        </section>

        <!-- SECTION 5 -->
        <section class="guide-box">
            <h2>Staff Responsibilities</h2>
            <ol>
                <li>Participate in staff meetings when possible.</li>
                <li>Stay active in staff communication channels.</li>
                <li>Help maintain a friendly, organized, and safe environment.</li>
                <li>Respond to pings or questions when available.</li>
                <li>Keep updated with changes in server rules or policies.</li>
            </ol>
        </section>

        <!-- SECTION 6 -->
        <section class="guide-box">
            <h2>Final Notes for Staff</h2>
            <p>Thank you for being part of the team. Your work helps the server grow and remain a positive place for everyone. If you ever feel unsure about what to do in a situation, always ask another staff member—never guess.</p>
            <p>Your presence, decisions, and attitude directly shape the community. Stay responsible, stay respectful, and keep improving.</p>
        </section>

    </div>

    <script>
        const toggle = document.getElementById('themeToggle');
        toggle.addEventListener('click', () => {
            document.body.classList.toggle('dark');
            toggle.innerHTML = document.body.classList.contains('dark')
                ? '<i class="fa-solid fa-sun"></i>'
                : '<i class="fa-solid fa-moon"></i>';
        });
    </script>

</body>
</html>
