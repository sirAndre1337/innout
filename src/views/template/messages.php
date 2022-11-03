<?php

$errors = [];

if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
} else if ($exception) {
    $message = ['type' => 'error' , 'message' => $exception->getMessage()];

    if(get_class($exception)=== 'ValidationException'){
        $errors = $exception->getErrors();
    }
}
?>

<?php if($message) : ?>
    <div 
    role="alert"
    class="my-3 alert alert-<?= $message['type'] === 'error' ? 'danger' : 'success' ?>" 
    >
        <?= $message['message'] ?>
    </div>
<?php endif ?>