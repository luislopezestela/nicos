<?php 
if ($f == "movies") {
    $html      = "";
    $movies_ls = array();
    $data      = array(
        "status" => 404,
        "html" => $wo['lang']['no_result']
    );
    if ($s == 'rec') {
        $movies_ls = lui_GetRecommendedFilms();
        if (count($movies_ls) > 0) {
            foreach ($movies_ls as $wo['film']) {
                $html .= lui_LoadPage("movies/includes/films-list");
            }
            $data['status'] = 200;
            $data['html']   = $html;
        }
    } else if ($s == 'new') {
        $movies_ls = lui_GetNewFilms();
        if (count($movies_ls) > 0) {
            foreach ($movies_ls as $wo['film']) {
                $html .= lui_LoadPage("movies/includes/films-list");
            }
            $data['status'] = 200;
            $data['html']   = $html;
        }
    } else if ($s == 'mtw') {
        $movies_ls = lui_GetMtwFilms();
        if (count($movies_ls) > 0) {
            foreach ($movies_ls as $wo['film']) {
                $html .= lui_LoadPage("movies/includes/films-list");
            }
            $data['status'] = 200;
            $data['html']   = $html;
        }
    } else if ($s == 'search' && isset($_GET['key'])) {
        $movies_ls = lui_SearchFilms($_GET['key']);
        if (count($movies_ls) > 0) {
            foreach ($movies_ls as $wo['film']) {
                $html .= lui_LoadPage("movies/includes/films-list-item");
            }
            $data['status'] = 200;
            $data['html']   = $html;
        }
    } else if ($s == 'load' && isset($_GET['offset']) && is_numeric($_GET['offset']) && isset($_GET['t'])) {
        $movies_ls = false;
        if ($_GET['t'] == 'a' && intval($_GET['offset']) > 0) {
            $movies_ls = lui_GetMovies(array(
                'offset' => $_GET['offset']
            ));
            if (count($movies_ls) > 0) {
                foreach ($movies_ls as $wo['film']) {
                    $html .= lui_LoadPage("movies/includes/films-list");
                }
                $data['status'] = 200;
                $data['html']   = $html;
            }
        } else if ($_GET['t'] == 'g' && intval($_GET['offset']) > 0 && isset($_GET['g'])) {
            $movies_ls = lui_GetMovies(array(
                'offset' => $_GET['offset'],
                'genre' => $_GET['g']
            ));
            if (count($movies_ls) > 0) {
                foreach ($movies_ls as $wo['film']) {
                    $html .= lui_LoadPage("movies/includes/films-list");
                }
                $data['status'] = 200;
                $data['html']   = $html;
            }
        } else if ($_GET['t'] == 'c' && intval($_GET['offset']) > 0 && isset($_GET['c'])) {
            $movies_ls = lui_GetMovies(array(
                'offset' => $_GET['offset'],
                'country' => $_GET['c']
            ));
            if (count($movies_ls) > 0) {
                foreach ($movies_ls as $wo['film']) {
                    $html .= lui_LoadPage("movies/includes/films-list");
                }
                $data['status'] = 200;
                $data['html']   = $html;
            }
        }
    } else if ($s == 'delete' && isset($_GET['id'])) {
        $result = lui_DeleteFilm($_GET['id']);
        if ($result == true) {
            $data['status'] = 200;
            unset($data['html']);
        }
    } else if ($s == "add-movie-comm") {
        $html = "";
        if (isset($_POST['text']) && isset($_POST['movie']) && is_numeric(($_POST['movie'])) && strlen($_POST['text']) > 2) {
            $registration_data = array(
                'movie_id' => lui_Secure($_POST['movie']),
                'user_id' => $wo['user']['id'],
                'text' => lui_Secure($_POST['text']),
                'posted' => time()
            );
            $lastId            = lui_RegisterMovieComment($registration_data);
            if ($lastId && is_numeric($lastId)) {
                $comment = lui_GetMovieComments(array(
                    'id' => $lastId
                ));
                if ($comment && count($comment) > 0) {
                    foreach ($comment as $wo['comment']) {
                        $html .= lui_LoadPage('movies/includes/comments-list');
                    }
                    $data = array(
                        'status' => 200,
                        'html' => $html,
                        'comments' => lui_GetMovieCommentsCount($_POST['movie'])
                    );
                }
            }
        }
    } else if ($s == "add-movie-commreply") {
        $html = "";
        if (isset($_POST['text']) && isset($_POST['c_id']) && is_numeric(($_POST['c_id'])) && strlen($_POST['text']) > 2 && isset($_POST['m_id']) && is_numeric($_POST['m_id'])) {
            $registration_data = array(
                'comm_id' => lui_Secure($_POST['c_id']),
                'movie_id' => lui_Secure($_POST['m_id']),
                'user_id' => $wo['user']['id'],
                'text' => lui_Secure($_POST['text']),
                'posted' => time()
            );
            $lastId            = lui_RegisterMovieCommentReply($registration_data);
            if ($lastId && is_numeric($lastId)) {
                $comment = lui_GetMovieCommentReplies(array(
                    'id' => $lastId
                ));
                if ($comment && count($comment) > 0) {
                    foreach ($comment as $wo['comm-reply']) {
                        $html .= lui_LoadPage('movies/includes/commreplies-list');
                    }
                    $data = array(
                        'status' => 200,
                        'html' => $html,
                        'comments' => lui_GetMovieCommentsCount($_POST['m_id'])
                    );
                }
            }
        }
    }
    if ($s == "del-movie-comment") {
        $data = array(
            'status' => 304
        );
        if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0 && isset($_GET['m_id']) && is_numeric($_GET['m_id'])) {
            if (lui_DeleteMovieComment($_GET['id'], $_GET['m_id'])) {
                $data['status']   = 200;
                $data['comments'] = lui_GetMovieCommentsCount($_GET['m_id']);
            }
        }
    }
    if ($s == "del-movie-commreplies") {
        $data = array(
            'status' => 304
        );
        if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0 && isset($_GET['m_id']) && is_numeric($_GET['m_id'])) {
            if (lui_DeleteMovieCommReply($_GET['id'], $_GET['m_id'])) {
                $data['status'] = 200;
            }
        }
    }
    if ($s == "add-movie-commlikes") {
        $data = array(
            'status' => 304
        );
        if (isset($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0 && isset($_POST['m_id']) && is_numeric($_POST['m_id'])) {
            $blogCommentLikes = lui_AddMovieCommentLikes($_POST['id'], $_POST['m_id']);
            $likes            = lui_GetMovieCommLikes($_POST['id']);
            $dislikes         = lui_GetMovieCommDisLikes($_POST['id']);
            if ($blogCommentLikes) {
                $data['status']   = 200;
                $data['likes']    = ($likes > 0) ? $likes : '';
                $data['dislikes'] = ($dislikes > 0) ? $dislikes : '';
            }
        }
    }
    if ($s == "add-movie-commdislikes") {
        $data = array(
            'status' => 304
        );
        if (isset($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0 && isset($_POST['m_id']) && is_numeric($_POST['m_id'])) {
            $blogCommentLikes = lui_AddMovieCommentDisLikes($_POST['id'], $_POST['m_id']);
            $likes            = lui_GetMovieCommLikes($_POST['id']);
            $dislikes         = lui_GetMovieCommDisLikes($_POST['id']);
            if ($blogCommentLikes) {
                $data['status']   = 200;
                $data['likes']    = ($likes > 0) ? $likes : '';
                $data['dislikes'] = ($dislikes > 0) ? $dislikes : '';
            }
        }
    }
    if ($s == "add-movie-crlikes") {
        $data = array(
            'status' => 304
        );
        if (isset($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0 && isset($_POST['m_id']) && is_numeric($_POST['m_id'])) {
            $blogCommReplyLikes = lui_AddMovieCommReplyLikes($_POST['id'], $_POST['m_id']);
            $likes              = lui_GetMovieCommReplyLikes($_POST['id']);
            $dislikes           = lui_GetMovieCommReplyDisLikes($_POST['id']);
            if ($blogCommReplyLikes) {
                $data['status']   = 200;
                $data['likes']    = ($likes > 0) ? $likes : '';
                $data['dislikes'] = ($dislikes > 0) ? $dislikes : '';
            }
        }
    }
    if ($s == "add-movie-crdislikes") {
        $data = array(
            'status' => 304
        );
        if (isset($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0 && isset($_POST['m_id']) && is_numeric($_POST['m_id'])) {
            $blogCommReplyLikes = lui_AddMovieCommReplyDisLikes($_POST['id'], $_POST['m_id']);
            $likes              = lui_GetMovieCommReplyLikes($_POST['id']);
            $dislikes           = lui_GetMovieCommReplyDisLikes($_POST['id']);
            if ($blogCommReplyLikes) {
                $data['status']   = 200;
                $data['likes']    = ($likes > 0) ? $likes : '';
                $data['dislikes'] = ($dislikes > 0) ? $dislikes : '';
            }
        }
    }
    if ($s == "load-comments") {
        if (isset($_GET['offset']) && is_numeric($_GET['offset']) && $_GET['offset'] > 0 && isset($_GET['m_id']) && is_numeric($_GET['m_id'])) {
            $comments = lui_GetMovieComments(array(
                "movie_id" => $_GET['m_id'],
                "offset" => $_GET['offset']
            ));
            if (count($comments)) {
                foreach ($comments as $wo['comment']) {
                    $html .= lui_LoadPage('movies/includes/comments-list');
                }
                $data['status'] = 200;
                $data['html']   = $html;
            }
        }
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
