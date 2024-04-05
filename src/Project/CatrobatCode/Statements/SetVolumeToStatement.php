<?php

declare(strict_types=1);

namespace App\Project\CatrobatCode\Statements;

class SetVolumeToStatement extends BaseSetToStatement
{
  /**
   * @var string
   */
  final public const BEGIN_STRING = 'volume';
  /**
   * @var string
   */
  final public const END_STRING = ')%<br/>';

  public function __construct(mixed $statementFactory, mixed $xmlTree, mixed $spaces)
  {
    parent::__construct($statementFactory, $xmlTree, $spaces,
      self::BEGIN_STRING,
      self::END_STRING);
  }

  public function getBrickText(): string
  {
    $formula_string = $this->getFormulaListChildStatement()->executeChildren();
    $formula_string_without_markup = preg_replace('#<[^>]*>#', '', $formula_string);

    return 'Set volume to '.$formula_string_without_markup.'%';
  }

  public function getBrickColor(): string
  {
    return '1h_brick_violet.png';
  }
}
