<?php

namespace app;

use Exception;
use Error;

class ErrorCont {
    public function viewErrors() {
        try {
            $this->noFunction();
            if (true) {
                throw new Exception('error');
            }
        } catch (Error $e) {
            echo ('error!');
        }

    }
}
