<?php

namespace App\Repositories\HistoryHealth;

use App\Globals\Constants;
use App\Models\HistoryHealth;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\HistoryHealthRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 *
 */
class HistoryHealthRepository extends BaseRepository implements HistoryHealthRepositoryInterface
{
    /**
     * @param HistoryHealth $model
     */
    public function __construct(HistoryHealth $model)
    {
        parent::__construct($model);
    }

    /**
     * @return array
     */
    public function index(): array
    {
        $userId = auth()->user()->id;
        $result = [
            'month' => [],
            'weight' => [],
            'body_fat_percent' => []
        ];
        $historyHealths = $this->model->where('user_id', $userId)->orderByDesc('date')->take(Constants::NUMBER_RECORD_HISTORY)->get();

        return $this->formatData($historyHealths, $result);
    }

    /**
     * @param mixed $historyHealths
     * @param array $result
     * @return array
     */
    private function formatData(mixed $historyHealths, array $result): array
    {
        foreach ($historyHealths as  $historyHealth) {
            $date = $historyHealth->date->format('m') . '月';

            if (!in_array($date, $result['month'])) $result['month'][] = $date;

            if ($historyHealth->type === HistoryHealth::TYPE_WEIGHT) {
                $result['weight'][] = $historyHealth->number;
            } elseif ($historyHealth->type === HistoryHealth::TYPE_BODY_FAT_PERCENT) {
                $result['body_fat_percent'][] = $historyHealth->number;
            }
        }
        $result['month'] = array_reverse($result['month']);

        return $result;
    }
}
