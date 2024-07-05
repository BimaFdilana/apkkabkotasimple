import 'package:flutter/material.dart';

class AboutDeveloper extends StatelessWidget {
  const AboutDeveloper({super.key});

  @override
  Widget build(BuildContext context) {
    List<String> fileNames = ['images/iqbal.jpeg', 'images/polbeng.png'];
    return Scaffold(
      appBar: AppBar(
        title: const Text('About Developer'),
      ),
      body: SingleChildScrollView(
        scrollDirection: Axis.vertical,
        child: Center(
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.center,
            children: <Widget>[
              const SizedBox(height: 30.0),
              Image.asset(
                fileNames[0],
                height: 200.0,
                fit: BoxFit.fill,
              ),
              const SizedBox(height: 15.0),
              const Text(
                "iqbal",
                style: TextStyle(
                  fontSize: 16.0,
                ),
              ),
              const SizedBox(height: 5.0),
              const Text(
                "Bidang Minat: Software Engineering",
                style: TextStyle(
                  fontSize: 16.0,
                ),
              ),
              const SizedBox(height: 5.0),
              const Text(
                "Email: iqbal@polbeng.ac.id",
                style: TextStyle(
                  fontSize: 16.0,
                ),
              ),
              const SizedBox(height: 30.0),
              Image.asset(
                fileNames[1],
                height: 200.0,
                fit: BoxFit.fill,
              ),
              const SizedBox(height: 15.0),
              const Text(
                "Politeknik Negeri Bengkalis",
                style: TextStyle(
                  fontSize: 16.0,
                ),
              ),
              const SizedBox(height: 5.0),
              const Text(
                "Jurusan: Teknik Informatika",
                style: TextStyle(
                  fontSize: 16.0,
                ),
              ),
              const SizedBox(height: 5.0),
              const Text(
                "Prodi: D4 Rekayasa Perangkat Lunak",
                style: TextStyle(
                  fontSize: 16.0,
                ),
              ),
              const SizedBox(height: 30.0),
            ],
          ),
        ),
      ),
    );
  }
}
