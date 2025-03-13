<?php
function handleFormSubmission($title, $description)
{
    $response = ['success' => false, 'message' => ''];

    if (strlen($title) <= 3) {
        $response['message'] = 'the title should be longer than 3 characters.';
    } elseif (strlen($description) <= 10) {
        $response['message'] = 'the descriptions should be longer than 10 characters.';
    } else {
        $safeTitle = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
        $safeDescription = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');

        $response['success'] = true;
        $response['message'] = 'note submitted!';
    }

    return $response;
}
?>
