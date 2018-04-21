<?php

	namespace App\Models\Enums;


    class RoomStatus extends Enum {
		const OPEN = 'open';
		const PASSWORD_PROTECT = 'password_protect';
		const IN_PROGRESS = 'in_progress';
		const FINISHED = 'finished';
	}
