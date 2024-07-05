import 'dart:async';
import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:kabupaten_kota/page/about_developer.dart';
import 'package:kabupaten_kota/page/detail_kabkota.dart';

import '../model/kabkota.dart';

class KabKotaListView extends StatefulWidget {
  const KabKotaListView({super.key});

  @override
  KabKotaListViewState createState() => KabKotaListViewState();
}

class KabKotaListViewState extends State<KabKotaListView> {
  static String uRL = 'http://10.0.2.2/project';
  late Future<List<KabKota>> resultData;

  @override
  void initState() {
    super.initState();
    resultData = _fetchKabKota();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Kabupaten/Kota App'),
        actions: <Widget>[
          IconButton(
            icon: const Icon(Icons.account_circle),
            onPressed: () {
              Navigator.push(
                context,
                MaterialPageRoute(
                  builder: (context) => const AboutDeveloper(),
                ),
              );
            },
          ),
        ],
      ),
      body: FutureBuilder<List<KabKota>>(
        future: _fetchKabKota(),
        builder: (context, snapshot) {
          return RefreshIndicator(
            onRefresh: _pullRefresh,
            child: Center(
              child: _listView(snapshot),
            ),
          );
        },
      ),
    );
  }

  Future<void> _pullRefresh() async {
    setState(() {
      resultData = _fetchKabKota();
    });
  }

  Widget _listView(AsyncSnapshot<List<KabKota>> snapshot) {
    if (snapshot.hasData) {
      List<KabKota>? data = snapshot.data;
      return _kabKotaListView(data!);
    } else if (snapshot.hasError) {
      return Text("${snapshot.error}");
    }
    return const Center(child: CircularProgressIndicator());
  }

  Future<List<KabKota>> _fetchKabKota() async {
    var uri = Uri.parse('$uRL/api/read_kabkota.php');
    final response = await http.get(uri);
    if (response.statusCode == 200) {
      var jsonResponse = jsonDecode(response.body);
      List jsonData = jsonResponse['data'];
      return jsonData.map((kabKota) => KabKota.fromJson(kabKota)).toList();
    } else {
      throw Exception('Failed to load jobs from API');
    }
  }

  ListView _kabKotaListView(List<KabKota> data) {
    return ListView.builder(
      itemCount: data.length,
      itemBuilder: (context, index) {
        return _tile(context, data[index]);
      },
    );
  }

  ListTile _tile(BuildContext context, KabKota data) {
    return ListTile(
      title: Text(
        data.kabupatenKota,
        style: const TextStyle(
          fontWeight: FontWeight.w500,
          fontSize: 20,
        ),
      ),
      subtitle: Text("Pusat Pemerintahan: ${data.pusatPemerintahan}"),
      leading: Image.network(
        '$uRL/image/logo/${data.logo}',
        width: 50,
        height: 100,
      ),
      onTap: () {
        Navigator.push(
          context,
          MaterialPageRoute(
            builder: (context) => DetailKabKota(data: data),
          ),
        );
      },
    );
  }
}
