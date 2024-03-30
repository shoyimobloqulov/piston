<?php
$USAGE_MSG = `
<b>Usage:</b>
<pre>/run [language]
[your code]
...
/stdin [input text] (optional)
...</pre>

type /langs for list of supported languages.
`;

$INLINE_USAGE_MSG = `
<b>Inline usage:</b>
<pre>@iruncode_bot [language]
[your code]
...
/stdin [input text] (optional)
...</pre>
`;

$INLINE_USAGE_MSG_PLAINTEXT = `Usage: @iruncode_bot [language] [code]`;

$ERROR_STRING = `
Some error occured, try again later.
If the error persists, report it to the admins in the bot's bio.
`;

$STATS_MSG = `
<b>Stats for the bot:</b>

- Total messages sent: %d
- Total unique chats messaged in: %d
- Total unique users: %d
`




?>