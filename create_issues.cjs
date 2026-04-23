const fs = require('fs');
const { execSync } = require('child_process');

const content = fs.readFileSync('issues.md', 'utf-8');

// Use a more flexible regex for line breaks
const issueRegex = /## #\d+ — (?:🔴|🟡|🟢) (.*?)\r?\n([\s\S]*?)(?=\r?\n## #\d+ —|\r?\n## Ringkasan Issues)/g;

let match;
let i = 1;
let found = false;

while ((match = issueRegex.exec(content)) !== null) {
    found = true;
    const title = match[1].trim();
    const body = match[2].trim();
    
    console.log(`Creating issue: ${title}`);
    
    // Write body to a temporary file
    const bodyFile = `temp_issue_body_${i}.md`;
    fs.writeFileSync(bodyFile, body);
    
    // Run gh command
    try {
        const cmd = `gh issue create --title "${title}" --body-file "${bodyFile}"`;
        execSync(cmd, { stdio: 'inherit' });
        console.log(`Issue created successfully.\n`);
    } catch (e) {
        console.error(`Failed to create issue: ${title}\n`);
        console.error(e.message);
    }
    
    // Clean up
    if (fs.existsSync(bodyFile)) {
        fs.unlinkSync(bodyFile);
    }
    i++;
}

if (!found) {
    console.log("No issues found in the file.");
}
