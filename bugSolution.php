```php
function processData(array $data): array {
  // Check if the array is empty
  if (empty($data)) {
    return []; // Return an empty array if input is empty
  }

  $result = [];
  foreach ($data as $item) {
    // Check if the item is an array
    if (!is_array($item)) {
      // Log or handle the error appropriately
      error_log('Warning: Non-array element encountered in processData: ' . print_r($item, true));
      continue; // Skip to the next item
    }

    //Check if the required keys exist before accessing them
    if (!isset($item['key1'], $item['key2']) || !is_numeric($item['key1']) || !is_numeric($item['key2'])) {
        error_log('Warning: Missing keys or non-numeric values in processData: '. print_r($item, true));
        continue; // Skip this item
    }

    $result[] = [
      'sum' => $item['key1'] + $item['key2'],
      'product' => $item['key1'] * $item['key2'],
    ];
  }
  return $result;
}

// Example usage:
$data = [
  ['key1' => 1, 'key2' => 2],
  ['key1' => 3, 'key2' => 4],
  ['key1' => 5, 'key2' => 6], 
  ['key1' => 7, 'key2' => 8],
  ['key3' => 9, 'key4' => 10], 
  'not an array'
];
$result = processData($data);
print_r($result);
```