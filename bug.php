```php
function processData(array $data): array {
  // Check if the array is empty
  if (empty($data)) {
    return []; // Return an empty array if input is empty
  }

  //Using array_map with anonymous function for concise processing
  return array_map(function ($item) {
    // Check if the item is an array
    if (!is_array($item)) {
      //Handle Non-array items, you might want to throw an exception, log it or return null
      return null; // Or throw new InvalidArgumentException('Item is not an array');
    }

    //Check if the required keys exist before accessing them.
    if (!isset($item['key1'], $item['key2'])) {
        return null; // Or throw new UnexpectedValueException('Missing required keys');
    }

    return [
      'sum' => $item['key1'] + $item['key2'],
      'product' => $item['key1'] * $item['key2'],
    ];
  }, $data);
}

// Example usage:
$data = [
  ['key1' => 1, 'key2' => 2],
  ['key1' => 3, 'key2' => 4],
  ['key1' => 5, 'key2' => 6], //Correct
  ['key1' => 7, 'key2' => 8],
  ['key3' => 9, 'key4' => 10], //Incorrect
  'not an array'
];
$result = processData($data);
print_r($result);
```