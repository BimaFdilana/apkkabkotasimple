import 'package:flutter/material.dart';
import 'package:kabupaten_kota/page/kabkota_listview.dart';

void main() {
  runApp(const MainApp());
}

class MainApp extends StatelessWidget {
  const MainApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Kabupaten/Kota App',
      theme: ThemeData(
        primarySwatch: Colors.blue,
        visualDensity: VisualDensity.adaptivePlatformDensity,
      ),
      home: const KabKotaListView(),
      debugShowCheckedModeBanner: false,
    );
  }
}
