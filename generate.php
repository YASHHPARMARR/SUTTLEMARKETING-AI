<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data['industry'], $data['company'], $data['objective'])) {
    echo json_encode(['error' => 'Invalid input']);
    exit;
}

$industry = htmlspecialchars($data['industry']);
$company = htmlspecialchars($data['company']);
$objective = htmlspecialchars($data['objective']);

// Prompt for campaign text
$promptText = "
Generate a complete HTML-formatted marketing campaign plan for a company called \"$company\" in the \"$industry\" industry with the objective of \"$objective\".

Include these sections as headings using proper HTML formatting:
- ✨ AI Generated Campaign Title with brand name and objective
- 🧬 Core Brand Values (with a short intro and bullet points)
- 📢 Campaign Message (short slogan and paragraph)
- 🧠 Target Audience (bullet points and insights)
- 🥊 Competitor Analysis (brief summary + what makes $company unique)
- 📈 Suggested Brand Awareness Rollout (step-by-step list and CTA)

Use <h3>, <h4>, <p>, <ul>, <li>, and <blockquote> to format nicely. Keep it creative, professional, and beautiful in layout.
";

$textPayload = [
    "model" => "openai/gpt-3.5-turbo",
    "messages" => [
        ["role" => "system", "content" => "You are a senior marketing strategist AI that outputs styled HTML."],
        ["role" => "user", "content" => $promptText]
    ]
];

// Step 1: Generate campaign HTML
$ch1 = curl_init("https://openrouter.ai/api/v1/chat/completions");
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch1, CURLOPT_POST, true);
curl_setopt($ch1, CURLOPT_POSTFIELDS, json_encode($textPayload));
curl_setopt($ch1, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer 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"
]);
$textResponse = curl_exec($ch1);
$httpcode1 = curl_getinfo($ch1, CURLINFO_HTTP_CODE);
curl_close($ch1);

if ($httpcode1 !== 200) {
    echo json_encode(['error' => 'Text generation failed', 'response' => $textResponse]);
    exit;
}

$textResult = json_decode($textResponse, true);
$content = $textResult['choices'][0]['message']['content'] ?? '';

if (!$content) {
    echo json_encode(['error' => 'No campaign content returned']);
    exit;
}

// Step 2: Generate related image using DALL·E or similar
$imagePrompt = "Create a marketing visual for a {$industry} brand named {$company} with the campaign objective of '{$objective}'. The image should be creative, eye-catching, and visually represent the brand purpose. Use dark background and pastel highlights.";

$imagePayload = [
    "model" => "openai/dall-e-3",
    "prompt" => $imagePrompt,
    "size" => "1024x1024",
    "n" => 1
];

$ch2 = curl_init("https://openrouter.ai/api/v1/generate");
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch2, CURLOPT_POST, true);
curl_setopt($ch2, CURLOPT_POSTFIELDS, json_encode($imagePayload));
curl_setopt($ch2, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer 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"
]);
$imageResponse = curl_exec($ch2);
$httpcode2 = curl_getinfo($ch2, CURLINFO_HTTP_CODE);
curl_close($ch2);

$imageResult = json_decode($imageResponse, true);
$imageUrl = $imageResult['data'][0]['url'] ?? null;

if (!$imageUrl) {
    $imageUrl = null; // fallback
}

// Step 3: Return combined JSON
echo json_encode([
    'full' => $content,
    'image_url' => $imageUrl
]);
exit;
?>
