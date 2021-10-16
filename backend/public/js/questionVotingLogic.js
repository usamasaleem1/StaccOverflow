/**
 *
 */


async function questionVote(questionId, type) {

    // Check if user is logged in first
    if (!IS_LOGGED) {
        window.location.href = SIGN_IN_ROUTE;
        return;
    }

    const response = await fetch(QUESTION_VOTING_ROUTE, {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": CSRF_TOKEN,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            type: type,
            question_id: questionId
        })
    });

    if (response.ok) {
        window.location.reload();
    }
}

