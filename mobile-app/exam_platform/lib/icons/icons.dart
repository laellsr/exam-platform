import 'package:flutter/material.dart';

class HatIcon extends StatelessWidget {
  const HatIcon({super.key, this.height = 200, this.width = 200});

  final double height;
  final double width;

  @override
  Widget build(BuildContext context) {
    return Image.asset(
      'assets/icons/hat.png',
      height: height,
      width: width,
      alignment: Alignment.center,
    );
  }
}
