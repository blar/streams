<?php

declare(strict_types = 1);

namespace Blar\Streams;

abstract class Stream {

	private $handle;

	public function __destruct() {
		if($this->hasHandle()) {
			fclose($this->getHandle());
		}
	}

	protected function hasHandle(): bool {
		return is_resource($this->handle);
	}

	protected function getHandle() {
		return $this->handle;
	}

	public function read(int $length): string {
		return fread($this->getHandle(), $length);
	}

	public function write(string $data): void {
		fwrite($this->getHandle(), $data);
	}

}
