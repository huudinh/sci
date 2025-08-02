### Lọc dữ liệu theo cột F và điều kiện ở cột H bằng giá trị cho trước

```
=FILTER(IMPORTRANGE("https://docs.google.com/spreadsheets/d/1FMj5YRm4BlFJighiVS7wA82xP2_ZnBsX4aLmR7XuUQc"; "Sheet1!F:F"); IMPORTRANGE("https://docs.google.com/spreadsheets/d/1FMj5YRm4BlFJighiVS7wA82xP2_ZnBsX4aLmR7XuUQc"; "Sheet1!H:H") = "https://noisoidrgiang.com/datlichthamkham/")
```

### Lấy dữ liệu từ cột A đến cột I, với điều kiện cột H khác giá trị cho trước

```
=FILTER(IMPORTRANGE("https://docs.google.com/spreadsheets/d/1FMj5YRm4BlFJighiVS7wA82xP2_ZnBsX4aLmR7XuUQc"; "Sheet1!A:I"); IMPORTRANGE("https://docs.google.com/spreadsheets/d/1FMj5YRm4BlFJighiVS7wA82xP2_ZnBsX4aLmR7XuUQc"; "Sheet1!H:H") <> "https://noisoidrgiang.com/datlichthamkham/")
```

### Lọc dữ liệu loại trừ link

```
=FILTER(
  IMPORTRANGE("https://docs.google.com/spreadsheets/d/1FMj5YRm4BlFJighiVS7wA82xP2_ZnBsX4aLmR7XuUQc"; "Sheet1_dr!A:I");
  (IMPORTRANGE("https://docs.google.com/spreadsheets/d/1FMj5YRm4BlFJighiVS7wA82xP2_ZnBsX4aLmR7XuUQc"; "Sheet1_dr!H:H") <> "https://noisoidrgiang.com/datlichthamkham/") *
  (IMPORTRANGE("https://docs.google.com/spreadsheets/d/1FMj5YRm4BlFJighiVS7wA82xP2_ZnBsX4aLmR7XuUQc"; "Sheet1_dr!H:H") <> "https://noisoidrgiang.com/datlichthamkhambacsigiang/")
)

```

### Lọc dự liệu theo link cho trước

```
=FILTER(
  IMPORTRANGE("https://docs.google.com/spreadsheets/d/1FMj5YRm4BlFJighiVS7wA82xP2_ZnBsX4aLmR7XuUQc"; "Sheet1_dr!A:I");
  (IMPORTRANGE("https://docs.google.com/spreadsheets/d/1FMj5YRm4BlFJighiVS7wA82xP2_ZnBsX4aLmR7XuUQc"; "Sheet1_dr!H:H") = "https://noisoidrgiang.com/datlichthamkhambacsigiang/")
)
```